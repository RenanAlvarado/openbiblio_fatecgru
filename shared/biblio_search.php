<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  $opacSuggestRequest = isset($_POST["suggest"]) && $_POST["suggest"] === "Y";
  if ($opacSuggestRequest) {
    $GLOBALS["opacSuggestRequest"] = true;
    $GLOBALS["opacSuggestResponseSent"] = false;
    ob_start();
    register_shutdown_function("opacSuggestJsonShutdown");
  }

  function opacSendSuggestionJson($items, $statusCode) {
    $json = json_encode(array("items" => $items));
    if ($json === false) {
      $json = '{"items":[]}';
    }
    while (ob_get_level() > 0) {
      ob_end_clean();
    }
    if (function_exists("header_remove")) {
      header_remove("Location");
    }
    if ($statusCode == 403) {
      header("HTTP/1.1 403 Forbidden");
    } elseif ($statusCode == 400) {
      header("HTTP/1.1 400 Bad Request");
    } elseif ($statusCode >= 500) {
      header("HTTP/1.1 500 Internal Server Error");
    } else {
      header("HTTP/1.1 200 OK");
    }
    header("Content-Type: application/json; charset=utf-8");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    $GLOBALS["opacSuggestResponseSent"] = true;
    echo $json;
  }

  function opacSuggestJsonShutdown() {
    if (empty($GLOBALS["opacSuggestRequest"]) || !empty($GLOBALS["opacSuggestResponseSent"])) {
      return;
    }
    opacSendSuggestionJson(array(), 500);
  }
 
  require_once("../shared/common.php");
  session_cache_limiter(null);

  #****************************************************************************
  #*  Checking for post vars.  Go back to form if none found.
  #****************************************************************************
  if (count($_POST) == 0) {
    header("Location: ../catalog/index.php");
    exit();
  }

  #****************************************************************************
  #*  Checking for tab name to show OPAC look and feel if searching from OPAC
  #****************************************************************************
  $tab = "cataloging";
  $helpPage = "biblioSearch";
  $lookup = "N";
  if (isset($_POST["tab"])) {
    $tab = $_POST["tab"];
  }
  if ($opacSuggestRequest && $tab != "opac") {
    opacSendSuggestionJson(array(), 403);
    exit();
  }
  if (isset($_POST["lookup"])) {
    $lookup = $_POST["lookup"];
    if ($lookup == 'Y') {
      $helpPage = "opacLookup";
    }
  }

  $nav = "search";
  if ($tab != "opac") {
    require_once("../shared/logincheck.php");
  }
  require_once("../classes/BiblioSearch.php");
  require_once("../classes/BiblioSearchQuery.php");
  require_once("../functions/searchFuncs.php");
  require_once("../classes/DmQuery.php");

  if ($opacSuggestRequest) {
    $suggestTypes = array("keyword", "title", "author", "subject", "callno", "barcodeNmbr");
    if (!isset($_POST["searchType"]) || !is_string($_POST["searchType"])
        || !in_array($_POST["searchType"], $suggestTypes, true)
        || !isset($_POST["searchText"]) || !is_string($_POST["searchText"])) {
      opacSendSuggestionJson(array(), 400);
      exit();
    }
    $suggestText = trim($_POST["searchText"]);
    if (mb_strlen($suggestText, "UTF-8") < 3 || mb_strlen($suggestText, "UTF-8") > 256) {
      opacSendSuggestionJson(array(), 200);
      exit();
    }
  }

  #****************************************************************************
  #*  Function declaration only used on this page.
  #****************************************************************************
  function printResultPages(&$loc, $currPage, $pageCount, $sort) {
    if ($pageCount <= 1) {
      return false;
    }
    echo $loc->getText("biblioSearchResultPages").": ";
    $maxPg = OBIB_SEARCH_MAXPAGES + 1;
    if ($currPage > 1) {
      echo "<a href=\"javascript:changePage(".H(addslashes($currPage-1)).",'".H(addslashes($sort))."')\">&laquo;".$loc->getText("biblioSearchPrev")."</a> ";
    }
    for ($i = 1; $i <= $pageCount; $i++) {
      if ($i < $maxPg) {
        if ($i == $currPage) {
          echo "<b>".H($i)."</b> ";
        } else {
          echo "<a href=\"javascript:changePage(".H(addslashes($i)).",'".H(addslashes($sort))."')\">".H($i)."</a> ";
        }
      } elseif ($i == $maxPg) {
        echo "... ";
      }
    }
    if ($currPage < $pageCount) {
      echo "<a href=\"javascript:changePage(".($currPage+1).",'".$sort."')\">".$loc->getText("biblioSearchNext")."&raquo;</a> ";
    }
  }

  function printOpacSearchPanel(&$loc, $searchText, $searchType, $lookup) {
    $types = array("keyword" => "opac_Keyword", "title" => "opac_Title", "author" => "opac_Author", "subject" => "opac_Subject", "callno" => "opac_Callno");
    $inputLabelKey = isset($types[$searchType]) ? $types[$searchType] : "opac_Keyword";
    echo '<section class="opac-search-panel opac-results-search" aria-labelledby="opac-results-search-title">';
    echo '<h1 id="opac-results-search-title">'.$loc->getText("opac_SearchHeading").'</h1>';
    echo '<form class="opac-search-form" name="opacSearchForm" method="POST" action="../shared/biblio_search.php">';
    echo '<div class="opac-search-controls"><div class="opac-search-field"><label class="opac-search-label" for="opac-search-type">'.$loc->getText("opac_SearchTypeLabel").'</label><select id="opac-search-type" name="searchType">';
    foreach ($types as $value => $labelKey) {
      echo '<option value="'.H($value).'"'.($searchType == $value ? ' selected="selected"' : '').'>'.$loc->getText($labelKey).'</option>';
    }
    echo '</select></div><div class="opac-search-field"><label class="opac-search-label opac-search-input-label" for="opac-search-text">'.$loc->getText($inputLabelKey).'</label><div class="opac-suggest-wrap">';
    echo '<input class="opac-search-input" id="opac-search-text" type="text" name="searchText" maxlength="256" value="'.H($searchText).'" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" aria-expanded="false" aria-controls="opac-search-suggestions">';
    echo '<ul class="opac-suggestions" id="opac-search-suggestions" role="listbox" hidden="hidden"></ul></div></div>';
    echo '<input type="hidden" name="sortBy" value="default"><input type="hidden" name="tab" value="opac"><input type="hidden" name="lookup" value="'.H($lookup).'">';
    echo '<div class="opac-search-action"><span class="opac-search-label" aria-hidden="true">&nbsp;</span><button class="opac-search-button" type="submit">'.$loc->getText("opac_Search").'</button></div></div></form></section>';
  }

  function printOpacResultPages(&$loc, $currPage, $pageCount, $sort) {
    if ($pageCount <= 1) return false;
    echo '<nav class="opac-pagination" aria-label="'.H($loc->getText("biblioSearchResultPages")).'">';
    if ($currPage > 1) echo '<a href="javascript:changePage('.H($currPage-1).',\''.H($sort).'\')">&laquo; '.$loc->getText("biblioSearchPrev").'</a>';
    else echo '<span class="opac-page-disabled" aria-disabled="true">&laquo; '.$loc->getText("biblioSearchPrev").'</span>';

    $desktopStart = max(1, $currPage - 1);
    $desktopEnd = min($pageCount, $currPage + 1);
    if ($pageCount <= 7) {
      $desktopStart = 1;
      $desktopEnd = $pageCount;
    } elseif ($currPage <= 1) {
      $desktopEnd = min($pageCount, 3);
    } elseif ($currPage == 2) {
      $desktopEnd = min($pageCount, 4);
    } elseif ($currPage >= $pageCount) {
      $desktopStart = max(1, $pageCount - 2);
    }

    $tabletStart = max(1, $currPage - 1);
    $tabletEnd = min($pageCount, $currPage + 1);
    if ($pageCount <= 5) {
      $tabletStart = 1;
      $tabletEnd = $pageCount;
    } elseif ($currPage <= 1) {
      $tabletEnd = min($pageCount, 3);
    } elseif ($currPage >= $pageCount) {
      $tabletStart = max(1, $pageCount - 2);
    }

    $pageLayouts = array();
    for ($i = $desktopStart; $i <= $desktopEnd; $i++) {
      if (!isset($pageLayouts[$i])) $pageLayouts[$i] = array();
      $pageLayouts[$i]["desktop"] = true;
    }
    if (!isset($pageLayouts[1])) $pageLayouts[1] = array();
    $pageLayouts[1]["desktop"] = true;
    if (!isset($pageLayouts[$pageCount])) $pageLayouts[$pageCount] = array();
    $pageLayouts[$pageCount]["desktop"] = true;
    for ($i = $tabletStart; $i <= $tabletEnd; $i++) {
      if (!isset($pageLayouts[$i])) $pageLayouts[$i] = array();
      $pageLayouts[$i]["tablet"] = true;
    }
    if (!isset($pageLayouts[$currPage])) $pageLayouts[$currPage] = array();
    $pageLayouts[$currPage]["mobile"] = true;
    ksort($pageLayouts, SORT_NUMERIC);

    foreach ($pageLayouts as $i => $layouts) {
      if ($i == $desktopStart && $desktopStart > 2) {
        echo '<span class="opac-page-ellipsis opac-page-desktop" aria-hidden="true">&hellip;</span>';
      }
      if ($i == $tabletStart && $tabletStart > 1) {
        echo '<span class="opac-page-ellipsis opac-page-tablet" aria-hidden="true">&hellip;</span>';
      }

      $layoutClasses = "";
      foreach ($layouts as $layout => $enabled) {
        $layoutClasses .= " opac-page-".$layout;
      }
      if ($i == $currPage) {
        echo '<span class="opac-page-current'.$layoutClasses.'" aria-current="page">'.H($i).'</span>';
      } else {
        echo '<a class="opac-page-number'.$layoutClasses.'" href="javascript:changePage('.H($i).',\''.H($sort).'\')">'.H($i).'</a>';
      }

      if ($i == $desktopEnd && $desktopEnd < $pageCount - 1) {
        echo '<span class="opac-page-ellipsis opac-page-desktop" aria-hidden="true">&hellip;</span>';
      }
      if ($i == $tabletEnd && $tabletEnd < $pageCount) {
        echo '<span class="opac-page-ellipsis opac-page-tablet" aria-hidden="true">&hellip;</span>';
      }
    }
    if ($currPage < $pageCount) echo '<a href="javascript:changePage('.H($currPage+1).',\''.H($sort).'\')">'.$loc->getText("biblioSearchNext").' &raquo;</a>';
    else echo '<span class="opac-page-disabled" aria-disabled="true">'.$loc->getText("biblioSearchNext").' &raquo;</span>';
    echo '</nav>';
    return true;
  }

  #****************************************************************************
  #*  Loading a few domain tables into associative arrays
  #****************************************************************************
  if (!$opacSuggestRequest) {
    $dmQ = new DmQuery();
    $dmQ->connect();
    $collectionDm = $dmQ->getAssoc("collection_dm");
    $materialTypeDm = $dmQ->getAssoc("material_type_dm");
    $materialImageFiles = $dmQ->getAssoc("material_type_dm", "image_file");
    $biblioStatusDm = $dmQ->getAssoc("biblio_status_dm");
    $dmQ->close();
  }

  #****************************************************************************
  #*  Retrieving post vars and scrubbing the data
  #****************************************************************************
  if ($opacSuggestRequest) {
    $currentPageNmbr = 1;
  } elseif (isset($_POST["page"])) {
    $currentPageNmbr = intval($_POST["page"]);
  } else {
    $currentPageNmbr = 1;
  }
  $searchType = $_POST["searchType"];
  if ($opacSuggestRequest) {
    $sortBy = "default";
  } else {
    $sortBy = $_POST["sortBy"];
  }
  if ($sortBy == "default") {
    if ($searchType == "author") {
      $sortBy = "author";
    } else {
      $sortBy = "title";
    }
  }
  $searchText = trim($_POST["searchText"]);
  # remove redundant whitespace
  $searchText = preg_replace('/\s+/', " ", $searchText);
  $isBrowseAll = ($searchText == "");
  $opacReturnContextQuery = "";
  if ($tab == "opac") {
    $returnSearchType = in_array($searchType, array("keyword", "title", "author", "subject", "callno", "barcodeNmbr"), true) ? $searchType : "keyword";
    $returnSortBy = in_array($sortBy, array("title", "author"), true) ? $sortBy : "title";
    $returnLookup = ($lookup == "Y") ? "Y" : "N";
    $returnPage = ($currentPageNmbr > 0) ? $currentPageNmbr : 1;
    $opacReturnContextQuery = http_build_query(array(
      "returnSearch" => "Y",
      "searchType" => $returnSearchType,
      "searchText" => $searchText,
      "sortBy" => $returnSortBy,
      "page" => $returnPage,
      "lookup" => $returnLookup
    ), "", "&");
  }
  if ($searchType == "barcodeNmbr") {
    $sType = OBIB_SEARCH_BARCODE;
    $words[] = $searchText;
  } else {
    $words = explodeQuoted($searchText);
    if ($searchType == "author") {
      $sType = OBIB_SEARCH_AUTHOR;
    } elseif ($searchType == "subject") {
      $sType = OBIB_SEARCH_SUBJECT;
    } elseif ($searchType == "callno") {
      $sType = OBIB_SEARCH_CALLNO;
    } elseif ($searchType == "keyword") {
      $sType = OBIB_SEARCH_KEYWORD;
    } else {
      $sType = OBIB_SEARCH_TITLE;
    }
  }

  #****************************************************************************
  #*  Search database
  #****************************************************************************
  $biblioQ = new BiblioSearchQuery();
  if ($opacSuggestRequest) {
    $biblioQ->setItemsPerPage(25);
  } else {
    $biblioQ->setItemsPerPage(OBIB_ITEMS_PER_PAGE);
  }
  $biblioQ->connect();
  if ($biblioQ->errorOccurred()) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  # checking to see if we are in the opac search or logged in
  if ($tab == "opac") {
    $opacFlg = true;
  } else {
    $opacFlg = false;
  }
  if (!$biblioQ->search($sType,$words,$currentPageNmbr,$sortBy,$opacFlg)) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }

  if ($opacSuggestRequest) {
    $items = array();
    $seenBibids = array();
    while ($biblio = $biblioQ->fetchRow()) {
      $bibid = $biblio->getBibid();
      if (isset($seenBibids[$bibid])) {
        continue;
      }
      $seenBibids[$bibid] = true;
      $title = trim($biblio->getTitle());
      if ($title == "") {
        continue;
      }
      $callNumber = trim($biblio->getCallNmbr1()." ".$biblio->getCallNmbr2()." ".$biblio->getCallNmbr3());
      $items[] = array(
        "title" => $title,
        "author" => $biblio->getAuthor(),
        "callNumber" => $callNumber
      );
      if (count($items) >= 5) {
        break;
      }
    }
    $biblioQ->close();
    opacSendSuggestionJson($items, 200);
    exit();
  }

  # Redirect to biblio_view if only one result
  if ($biblioQ->getRowCount() == 1 && $lookup !== 'Y' && ($tab != "opac" || !$isBrowseAll)) {
    $biblio = $biblioQ->fetchRow();
    $redirect = '../shared/biblio_view.php?bibid='.U($biblio->getBibid()).'&tab='.U($tab);
    if ($tab == "opac") {
      $redirect .= '&'.$opacReturnContextQuery;
    }
    header('Location: '.$redirect);
    exit();
  }
  
  #**************************************************************************
  #*  Show search results
  #**************************************************************************
  if ($tab == "opac") {
    require_once("../shared/header_opac.php");
  } else {
    require_once("../shared/header.php");
  }
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,"shared");
  if ($tab == "opac") {
    $opacLoc = new Localize(OBIB_LOCALE,"opac");
  }

  # Display no results message if no results returned from search.
  if ($biblioQ->getRowCount() == 0) {
    $biblioQ->close();
    if ($tab == "opac") {
      printOpacSearchPanel($opacLoc, $searchText, $searchType, $lookup);
      echo '<section class="opac-results" aria-labelledby="opac-results-title"><div class="opac-results-summary">';
      echo '<h2 id="opac-results-title">'.$loc->getText("biblioSearchResults").'</h2>';
      $typeLabels = array("keyword" => "opac_Keyword", "title" => "opac_Title", "author" => "opac_Author", "subject" => "opac_Subject", "callno" => "opac_Callno");
      $typeLabel = $opacLoc->getText(isset($typeLabels[$searchType]) ? $typeLabels[$searchType] : "opac_Keyword");
      echo '<p>'.H($loc->getText("biblioSearchResultTxt",array("items"=>0))).'</p>';
      if ($isBrowseAll) {
        echo '<p><strong>'.H($opacLoc->getText("opac_AllCollection")).'</strong></p>';
      } else {
        echo '<p><strong>'.H($opacLoc->getText("opac_Search")).':</strong> '.H($searchText).' <span class="opac-search-type-summary">'.H($typeLabel).'</span></p>';
      }
      echo '</div>';
      $emptyMessage = $isBrowseAll ? $opacLoc->getText("opac_EmptyCollection") : $loc->getText("biblioSearchNoResults");
      echo '<p class="opac-empty-state">'.$emptyMessage.'</p></section>';
    } else {
      echo $loc->getText("biblioSearchNoResults");
    }
    require_once("../shared/footer.php");
    exit();
  }
?>

<!--**************************************************************************
    *  Javascript to post back to this page
    ************************************************************************** -->
<script language="JavaScript" type="text/javascript">
<!--
function changePage(page,sort)
{
  document.changePageForm.page.value = page;
  document.changePageForm.sortBy.value = sort;
  document.changePageForm.submit();
}
-->
</script>


<!--**************************************************************************
    *  Form used by javascript to post back to this page
    ************************************************************************** -->
<form name="changePageForm" method="POST" action="../shared/biblio_search.php">
  <input type="hidden" name="searchType" value="<?php echo H($_POST["searchType"]);?>">
  <input type="hidden" name="searchText" value="<?php echo H($_POST["searchText"]);?>">
  <input type="hidden" name="sortBy" value="<?php echo H($_POST["sortBy"]);?>">
  <input type="hidden" name="lookup" value="<?php echo H($lookup);?>">
  <input type="hidden" name="page" value="1">
  <input type="hidden" name="tab" value="<?php echo H($tab);?>">
</form>

<?php if ($tab == "opac") { ?>
<?php printOpacSearchPanel($opacLoc, $searchText, $searchType, $lookup); ?>
<section class="opac-results" aria-labelledby="opac-results-title">
  <div class="opac-results-toolbar">
  <div class="opac-results-summary">
    <h2 id="opac-results-title"><?php echo $loc->getText("biblioSearchResults"); ?></h2>
    <p><?php echo H($loc->getText("biblioSearchResultTxt",array("items"=>$biblioQ->getRowCount()))); ?></p>
    <?php if ($isBrowseAll) { ?>
    <p><strong><?php echo H($opacLoc->getText("opac_AllCollection")); ?></strong></p>
    <?php } else { ?>
    <p><strong><?php echo H($opacLoc->getText("opac_Search")); ?>:</strong> <?php echo H($searchText); ?>
      <span class="opac-search-type-summary"><?php
        $typeLabels = array("keyword" => "opac_Keyword", "title" => "opac_Title", "author" => "opac_Author", "subject" => "opac_Subject", "callno" => "opac_Callno");
        echo H($opacLoc->getText(isset($typeLabels[$searchType]) ? $typeLabels[$searchType] : "opac_Keyword"));
      ?></span>
    </p>
    <?php } ?>
  </div>
  <?php if ($biblioQ->getRowCount() > 1) { ?>
  <div class="opac-sort-controls">
    <label for="opac-sort-select"><?php echo H($opacLoc->getText("opac_SortLabel")); ?></label>
    <select id="opac-sort-select" onchange="changePage(<?php echo H($currentPageNmbr); ?>, this.value)">
      <option value="title"<?php if ($sortBy == "title") echo ' selected="selected"'; ?>><?php echo $loc->getText("biblioSearchTitle"); ?></option>
      <option value="author"<?php if ($sortBy == "author") echo ' selected="selected"'; ?>><?php echo $loc->getText("biblioSearchAuthor"); ?></option>
    </select>
  </div>
  <?php } ?>
  </div>
  <?php printOpacResultPages($loc, $currentPageNmbr, $biblioQ->getPageCount(), $sortBy); ?>
  <div class="opac-results-list">
  <?php
    $priorBibid = 0;
    while ($biblio = $biblioQ->fetchRow()) {
      $isNewBiblio = ($biblio->getBibid() != $priorBibid);
      if ($isNewBiblio) {
        if ($priorBibid != 0) {
          echo '</div></article>';
        }
        $priorBibid = $biblio->getBibid();
        $materialCd = $biblio->getMaterialCd();
        $collectionCd = $biblio->getCollectionCd();
        $materialLabel = isset($materialTypeDm[$materialCd]) ? $materialTypeDm[$materialCd] : $materialCd;
        $collectionLabel = isset($collectionDm[$collectionCd]) ? $collectionDm[$collectionCd] : $collectionCd;
  ?>
    <article class="opac-result-card">
      <header class="opac-result-heading">
        <span class="opac-result-number"><?php echo H($biblioQ->getCurrentRowNmbr());?>.</span>
        <?php if (isset($materialImageFiles[$materialCd]) && $materialImageFiles[$materialCd] != "") { ?>
        <a class="opac-material-icon" href="../shared/biblio_view.php?bibid=<?php echo HURL($biblio->getBibid());?>&amp;tab=<?php echo HURL($tab);?>&amp;<?php echo H($opacReturnContextQuery); ?>"><img src="../images/<?php echo HURL($materialImageFiles[$materialCd]);?>" width="20" height="20" border="0" align="bottom" alt="<?php echo H($materialLabel);?>"></a>
        <?php } ?>
        <h3><a href="../shared/biblio_view.php?bibid=<?php echo HURL($biblio->getBibid());?>&amp;tab=<?php echo HURL($tab);?>&amp;<?php echo H($opacReturnContextQuery); ?>"><?php echo H($biblio->getTitle());?></a></h3>
      </header>
      <dl class="opac-biblio-details">
        <div><dt><?php echo $loc->getText("biblioSearchAuthor"); ?>:</dt><dd><?php if ($biblio->getAuthor() != "") echo H($biblio->getAuthor());?></dd></div>
        <div><dt><?php echo $loc->getText("biblioSearchMaterial"); ?>:</dt><dd><?php echo H($materialLabel);?></dd></div>
        <div><dt><?php echo $loc->getText("biblioSearchCollection"); ?>:</dt><dd><?php echo H($collectionLabel);?></dd></div>
        <div><dt><?php echo $loc->getText("biblioSearchCall"); ?>:</dt><dd><?php echo H($biblio->getCallNmbr1()." ".$biblio->getCallNmbr2()." ".$biblio->getCallNmbr3());?></dd></div>
      </dl>
      <div class="opac-copies-summary">
        <?php $copyCount = $biblioQ->getCurrentCopyCount(); ?>
        <?php if ($copyCount > 0) { ?>
          <span class="opac-copy-count"><strong><?php echo H($copyCount); ?></strong> <?php echo H($opacLoc->getText($copyCount == 1 ? "opac_CopySingular" : "opac_CopyPlural")); ?></span>
        <?php } else { ?>
          <span class="opac-no-copies"><?php echo $loc->getText("biblioViewNoCopies"); ?></span>
        <?php } ?>
      </div>
      <?php } ?>
  <?php
    }
    if ($priorBibid != 0) {
      echo '</div></article>';
    }
    $pageCount = $biblioQ->getPageCount();
    $biblioQ->close();
  ?>
  </div>
  <?php printOpacResultPages($loc, $currentPageNmbr, $pageCount, $sortBy); ?>
</section>
<?php require_once("../shared/footer.php"); exit(); ?>
<?php } ?>

<!--**************************************************************************
    *  Printing result stats and page nav
    ************************************************************************** -->
<?php 
  echo $loc->getText("biblioSearchResultTxt",array("items"=>$biblioQ->getRowCount()));
  if ($biblioQ->getRowCount() > 1) {
    echo $loc->getText("biblioSearch".$sortBy);
    if ($sortBy == "author") {
      echo "(<a href=\"javascript:changePage(".$currentPageNmbr.",'title')\">".$loc->getText("biblioSearchSortByTitle")."</a>).";
    } else {
      echo "(<a href=\"javascript:changePage(".$currentPageNmbr.",'author')\">".$loc->getText("biblioSearchSortByAuthor")."</a>).";
    }
  }
?>
<br />
<?php printResultPages($loc, $currentPageNmbr, $biblioQ->getPageCount(), $sortBy); ?><br>
<br>

<!--**************************************************************************
    *  Printing result table
    ************************************************************************** -->
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left" colspan="3">
      <?php echo $loc->getText("biblioSearchResults"); ?>:
    </th>
  </tr>
  <?php
    $priorBibid = 0;
    while ($biblio = $biblioQ->fetchRow()) {
      if ($biblio->getBibid() == $priorBibid) {
        if ($biblio->getBarcodeNmbr() != "") {
          #************************************
          #* print copy line only
          #************************************
          ?>
          <tr>
            <td nowrap="true" class="primary" valign="top" align="center"><font class="small">
              <?php echo H($biblioQ->getCurrentRowNmbr());?>.
            </font></td>
            <td class="primary" ><font class="small"><b><?php echo $loc->getText("biblioSearchCopyBCode"); ?></b>: <?php echo H($biblio->getBarcodeNmbr());?>
              <?php if ($lookup == 'Y') { ?>
                <a href="javascript:returnLookup('barcodesearch','barcodeNmbr','<?php echo H(addslashes($biblio->getBarcodeNmbr()));?>')"><?php echo $loc->getText("biblioSearchOutIn"); ?></a> | <a href="javascript:returnLookup('holdForm','holdBarcodeNmbr','<?php echo H(addslashes($biblio->getBarcodeNmbr()));?>')"><?php echo $loc->getText("biblioSearchHold"); ?></a>
              <?php } ?>
            </font></td>
            <td class="primary" ><font class="small"><b><?php echo $loc->getText("biblioSearchCopyStatus"); ?></b>: <?php echo H($biblioStatusDm[$biblio->getStatusCd()]);?></font></td>
          </tr>
          <?php 
        }
      } else {
        $priorBibid = $biblio->getBibid();

  ?>

  <tr>
    <td nowrap="true" class="primary" valign="top" align="center" rowspan="2">
      <?php echo H($biblioQ->getCurrentRowNmbr());?>.<br />
      <a href="../shared/biblio_view.php?bibid=<?php echo HURL($biblio->getBibid());?>&amp;tab=<?php echo HURL($tab);?>">
      <img src="../images/<?php echo HURL($materialImageFiles[$biblio->getMaterialCd()]);?>" width="20" height="20" border="0" align="bottom" alt="<?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>"></a>
    </td>
    <td class="primary" valign="top" colspan="2">
      <table class="primary" width="100%">
        <tr>
          <td class="noborder" width="1%" valign="top"><b><?php echo $loc->getText("biblioSearchTitle"); ?>:</b></td>
          <td class="noborder" colspan="3"><a href="../shared/biblio_view.php?bibid=<?php echo HURL($biblio->getBibid());?>&amp;tab=<?php echo HURL($tab);?>"><?php echo H($biblio->getTitle());?></a></td>
        </tr>
        <tr>
          <td class="noborder" valign="top"><b><?php echo $loc->getText("biblioSearchAuthor"); ?>:</b></td>
          <td class="noborder" colspan="3"><?php if ($biblio->getAuthor() != "") echo H($biblio->getAuthor());?></td>
        </tr>
        <tr>
          <td class="noborder" valign="top"><font class="small"><b><?php echo $loc->getText("biblioSearchMaterial"); ?>:</b></font></td>
          <td class="noborder" colspan="3"><font class="small"><?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?></font></td>
        </tr>
        <tr>
          <td class="noborder" valign="top"><font class="small"><b><?php echo $loc->getText("biblioSearchCollection"); ?>:</b></font></td>
          <td class="noborder" colspan="3"><font class="small"><?php echo H($collectionDm[$biblio->getCollectionCd()]);?></font></td>
        </tr>
        <tr>
          <td class="noborder" valign="top" nowrap="yes"><font class="small"><b><?php echo $loc->getText("biblioSearchCall"); ?>:</b></font></td>
          <td class="noborder" colspan="3"><font class="small"><?php echo H($biblio->getCallNmbr1()." ".$biblio->getCallNmbr2()." ".$biblio->getCallNmbr3());?></font></td>
        </tr>
      </table>
    </td>
  </tr>
  <?php
    if ($biblio->getBarcodeNmbr() != "") {
      ?>
      <tr>
        <td class="primary" ><font class="small"><b><?php echo $loc->getText("biblioSearchCopyBCode"); ?></b>: <?php echo H($biblio->getBarcodeNmbr());?>
          <?php if ($lookup == 'Y') { ?>
            <a href="javascript:returnLookup('barcodesearch','barcodeNmbr','<?php echo H(addslashes($biblio->getBarcodeNmbr()));?>')"><?php echo $loc->getText("biblioSearchOutIn"); ?></a> | <a href="javascript:returnLookup('holdForm','holdBarcodeNmbr','<?php echo H(addslashes($biblio->getBarcodeNmbr()));?>')"><?php echo $loc->getText("biblioSearchHold"); ?></a>
          <?php } ?>
        </font></td>
        <td class="primary" ><font class="small"><b><?php echo $loc->getText("biblioSearchCopyStatus"); ?></b>: <?php echo H($biblioStatusDm[$biblio->getStatusCd()]);?></font></td>
      </tr>
    <?php } else { ?>
      <tr>
         <td class="primary" colspan="2" ><font class="small"><?php echo $loc->getText("biblioSearchNoCopies"); ?></font></td>
      </tr>
    <?php 
    }
      }
    }
    $biblioQ->close();
  ?>
  </table><br>
<?php printResultPages($loc, $currentPageNmbr, $biblioQ->getPageCount(), $sortBy); ?><br>
<?php require_once("../shared/footer.php"); ?>
