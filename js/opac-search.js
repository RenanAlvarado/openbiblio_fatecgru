(function () {
  "use strict";

  var forms = document.querySelectorAll(".opac-search-form");

  function encodeFormValue(name, value) {
    return encodeURIComponent(name) + "=" + encodeURIComponent(value);
  }

  function hasClass(element, className) {
    return (" " + element.className + " ").indexOf(" " + className + " ") !== -1;
  }

  function initializeForm(form) {
    var input = form.querySelector(".opac-search-input");
    var searchType = form.querySelector('[name="searchType"]');
    var inputLabel = form.querySelector(".opac-search-input-label");
    var tabField = form.querySelector('[name="tab"]');
    var lookupField = form.querySelector('[name="lookup"]');
    var sortField = form.querySelector('[name="sortBy"]');
    var list = form.querySelector(".opac-suggestions");
    var timer = null;
    var request = null;
    var requestVersion = 0;
    var suggestions = [];
    var activeIndex = -1;
    var blurTimer = null;
    var responseCache = {};
    var responseCacheKeys = [];
    var lastRequestedKey = "";
    var lastTouchTapTime = 0;

    if (!input || !searchType || !tabField || !lookupField || !list || tabField.value !== "opac") {
      return;
    }

    function updateInputLabel() {
      if (!inputLabel || !searchType.options || !searchType.options.length) {
        return;
      }
      inputLabel.textContent = searchType.options[searchType.selectedIndex].text;
    }

    function clearOptions() {
      while (list.firstChild) {
        list.removeChild(list.firstChild);
      }
      suggestions = [];
      activeIndex = -1;
      input.removeAttribute("aria-activedescendant");
    }

    function closeSuggestions() {
      list.hidden = true;
      input.setAttribute("aria-expanded", "false");
      input.removeAttribute("aria-activedescendant");
      activeIndex = -1;
      var options = list.querySelectorAll('[role="option"]');
      for (var i = 0; i < options.length; i++) {
        options[i].setAttribute("aria-selected", "false");
      }
    }

    function cancelPendingRequest() {
      requestVersion++;
      if (timer !== null) {
        window.clearTimeout(timer);
        timer = null;
      }
      if (request !== null) {
        request.onreadystatechange = null;
        request.abort();
        request = null;
      }
    }

    function setActiveOption(index) {
      var options = list.querySelectorAll('[role="option"]');
      if (!options.length) {
        return;
      }
      if (index < 0) {
        index = options.length - 1;
      } else if (index >= options.length) {
        index = 0;
      }
      activeIndex = index;
      list.hidden = false;
      input.setAttribute("aria-expanded", "true");
      for (var i = 0; i < options.length; i++) {
        options[i].setAttribute("aria-selected", i === activeIndex ? "true" : "false");
      }
      input.setAttribute("aria-activedescendant", options[activeIndex].id);
    }

    function chooseSuggestion(index) {
      var item = suggestions[index];
      if (!item) {
        return;
      }
      cancelPendingRequest();
      window.clearTimeout(blurTimer);

      if (lookupField.value === "Y" && searchType.value === "callno" && item.callNumber) {
        input.value = item.callNumber;
      } else {
        input.value = item.title;
        searchType.value = "title";
      }

      closeSuggestions();
      form.submit();
    }

    function renderSuggestions(items) {
      clearOptions();
      if (!items || !items.length) {
        closeSuggestions();
        return;
      }

      for (var i = 0; i < items.length; i++) {
        if (!items[i] || !items[i].title) {
          continue;
        }
        var option = document.createElement("li");
        option.className = "opac-suggestion-option";
        option.id = list.id + "-option-" + suggestions.length;
        option.setAttribute("role", "option");
        option.setAttribute("aria-selected", "false");

        var title = document.createElement("span");
        title.className = "opac-suggestion-title";
        title.textContent = items[i].title;
        option.appendChild(title);

        if (items[i].author) {
          var author = document.createElement("span");
          author.className = "opac-suggestion-author";
          author.textContent = items[i].author;
          option.appendChild(author);
        }

        (function (optionIndex, optionElement) {
          optionElement.addEventListener("mouseenter", function () {
            setActiveOption(optionIndex);
          });
          optionElement.addEventListener("mousedown", function (event) {
            event.preventDefault();
          });
          optionElement.addEventListener("click", function () {
            chooseSuggestion(optionIndex);
          });
        }(suggestions.length, option));

        suggestions.push(items[i]);
        list.appendChild(option);
      }

      if (suggestions.length) {
        list.hidden = false;
        input.setAttribute("aria-expanded", "true");
      } else {
        closeSuggestions();
      }
    }

    function requestSuggestions() {
      var query = input.value.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " ");
      var cacheKey = searchType.value + "\n" + query;
      if (query.length < 3) {
        cancelPendingRequest();
        clearOptions();
        closeSuggestions();
        lastRequestedKey = "";
        return;
      }

      if (cacheKey === lastRequestedKey && (timer !== null || request !== null)) {
        return;
      }

      cancelPendingRequest();
      clearOptions();
      closeSuggestions();
      lastRequestedKey = cacheKey;

      if (Object.prototype.hasOwnProperty.call(responseCache, cacheKey)) {
        renderSuggestions(responseCache[cacheKey]);
        return;
      }

      var thisVersion = requestVersion;
      timer = window.setTimeout(function () {
        timer = null;
        var xhr = new XMLHttpRequest();
        request = xhr;
        xhr.open("POST", form.action, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        xhr.onreadystatechange = function () {
          if (xhr.readyState !== 4 || thisVersion !== requestVersion) {
            return;
          }
          request = null;
          if (xhr.status < 200 || xhr.status >= 300) {
            lastRequestedKey = "";
            closeSuggestions();
            clearOptions();
            return;
          }
          if (document.activeElement !== input) {
            closeSuggestions();
            clearOptions();
            return;
          }
          try {
            var response = JSON.parse(xhr.responseText);
            var items = response && response.items instanceof Array ? response.items : [];
            responseCache[cacheKey] = items;
            responseCacheKeys.push(cacheKey);
            if (responseCacheKeys.length > 20) {
              delete responseCache[responseCacheKeys.shift()];
            }
            renderSuggestions(items);
          } catch (error) {
            lastRequestedKey = "";
            closeSuggestions();
            clearOptions();
          }
        };

        var values = [
          encodeFormValue("suggest", "Y"),
          encodeFormValue("searchType", searchType.value),
          encodeFormValue("searchText", query),
          encodeFormValue("tab", tabField.value),
          encodeFormValue("lookup", lookupField.value),
          encodeFormValue("sortBy", sortField ? sortField.value : "default")
        ];
        xhr.send(values.join("&"));
      }, 120);
    }

    input.addEventListener("input", requestSuggestions);
    input.addEventListener("dblclick", function () {
      input.select();
    });
    input.addEventListener("touchend", function (event) {
      var currentTime = new Date().getTime();
      if (lastTouchTapTime > 0 && currentTime - lastTouchTapTime <= 450) {
        if (event.cancelable) {
          event.preventDefault();
        }
        input.select();
        lastTouchTapTime = 0;
      } else {
        lastTouchTapTime = currentTime;
      }
    }, false);
    updateInputLabel();
    searchType.addEventListener("change", function () {
      updateInputLabel();
      requestSuggestions();
    });

    input.addEventListener("keydown", function (event) {
      if (event.key === "ArrowDown" && suggestions.length) {
        event.preventDefault();
        setActiveOption(activeIndex + 1);
      } else if (event.key === "ArrowUp" && suggestions.length) {
        event.preventDefault();
        setActiveOption(activeIndex - 1);
      } else if (event.key === "Escape" && !list.hidden) {
        event.preventDefault();
        closeSuggestions();
      } else if (event.key === "Enter" && activeIndex >= 0) {
        event.preventDefault();
        chooseSuggestion(activeIndex);
      }
    });

    input.addEventListener("blur", function () {
      blurTimer = window.setTimeout(closeSuggestions, 150);
    });

    input.addEventListener("focus", function () {
      window.clearTimeout(blurTimer);
      if (suggestions.length) {
        list.hidden = false;
        input.setAttribute("aria-expanded", "true");
      }
    });
  }

  for (var i = 0; i < forms.length; i++) {
    initializeForm(forms[i]);
  }
}());
