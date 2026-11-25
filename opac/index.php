<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 ini_set('default_charset','UTF-8');
  require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "opac";
  $nav = "home";
  $helpPage = "opac";
  $focus_form_name = "phrasesearch";
  $focus_form_field = "searchText";
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

  $lookup = "N";
  if (isset($_GET["lookup"])) {
    $lookup = "Y";
    $helpPage = "opacLookup";
  }
  if (isset($_GET["msg"])) {
    $msg = "<font class=\"error\">".H($_GET["msg"])."</font><br><br>";
  } else {
    $msg = "";
  }
  require_once("../shared/header_opac.php");
?>

<main class="opac-home">
  <section class="opac-intro" aria-labelledby="opac-page-title">
    <p class="opac-eyebrow"><?php echo H(OBIB_LIBRARY_NAME); ?></p>
    <h1 id="opac-page-title"><?php echo $loc->getText("opac_Header");?></h1>
    <p class="opac-welcome"><?php echo $loc->getText("opac_WelcomeMsg");?></p>
  </section>

  <section class="opac-search-panel" aria-labelledby="opac-search-heading">
    <h2 id="opac-search-heading"><?php echo $loc->getText("opac_SearchTitle");?></h2>
    <form class="opac-search-form" name="phrasesearch" method="POST" action="../shared/biblio_search.php">
      <div class="opac-search-controls">
        <div class="opac-search-field">
          <label class="opac-search-label" for="opac-search-type"><?php echo $loc->getText("opac_SearchTitle");?></label>
          <select id="opac-search-type" name="searchType">
            <option value="keyword"<?php if ($lookup !== 'Y') { ?> selected<?php } ?>><?php echo $loc->getText("opac_Keyword");?></option>
            <option value="title"><?php echo $loc->getText("opac_Title");?></option>
            <option value="author"><?php echo $loc->getText("opac_Author");?></option>
            <option value="subject"><?php echo $loc->getText("opac_Subject");?></option>
            <option value="callno"<?php if ($lookup == 'Y') { ?> selected<?php } ?>><?php echo $loc->getText("opac_Callno");?></option>
          </select>
        </div>
        <div class="opac-search-field">
          <label class="opac-search-label opac-search-input-label" for="opac-search-text"><?php echo $loc->getText($lookup == 'Y' ? "opac_Callno" : "opac_Keyword");?></label>
          <div class="opac-suggest-wrap">
            <input class="opac-search-input" id="opac-search-text" type="text" name="searchText" maxlength="256" autocomplete="off" role="combobox" aria-autocomplete="list" aria-haspopup="listbox" aria-expanded="false" aria-controls="opac-search-suggestions">
            <ul class="opac-suggestions" id="opac-search-suggestions" role="listbox" hidden></ul>
          </div>
        </div>
        <input type="hidden" name="sortBy" value="default">
        <input type="hidden" name="tab" value="<?php echo H($tab); ?>">
        <input type="hidden" name="lookup" value="<?php echo H($lookup); ?>">
        <div class="opac-search-action"><span class="opac-search-label" aria-hidden="true">&nbsp;</span><button class="opac-search-button" type="submit"><?php echo $loc->getText("opac_Search");?></button></div>
      </div>
    </form>
  </section>

  <div class="opac-message" role="status"><?php echo $msg ?></div>
</main>

<?php include("../shared/footer.php"); ?>
