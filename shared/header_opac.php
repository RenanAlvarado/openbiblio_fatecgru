<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../classes/Localize.php");
  $headerLoc = new Localize(OBIB_LOCALE,"shared");

// code html tag with language attribute if specified.
echo "<html";
if (OBIB_HTML_LANG_ATTR != "") {
  echo " lang=\"".H(OBIB_HTML_LANG_ATTR)."\"";
}
echo ">\n";
?>
<head>
<?php if (OBIB_CHARSET != "") { ?>
<meta http-equiv="content-type" content="text/html; charset=<?php echo H(OBIB_CHARSET); ?>">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="OpenBiblio Library Automation System">
<title><?php echo H(OBIB_LIBRARY_NAME);?></title>
<style type="text/css">
  <?php include("../css/style.php");?>
</style>
<link rel="stylesheet" type="text/css" href="../css/opac.css">
<script language="JavaScript" type="text/javascript">
<!--
function popSecondary(url) {
    var SecondaryWin;
    SecondaryWin = window.open(url,"secondary","resizable=yes,scrollbars=yes,width=535,height=400");
}
function returnLookup(formName,fieldName,val) {
    window.opener.document.forms[formName].elements[fieldName].value=val;
    window.opener.focus();
    this.close();
}
-->
</script>
<script type="text/javascript" src="../js/opac-search.js" defer></script>
</head>
<body class="opac-page" bgcolor="<?php echo H(OBIB_PRIMARY_BG);?>" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" marginheight="0" marginwidth="0" <?php
  if (isset($focus_form_name) && ($focus_form_name != "")) {
    if (preg_match('/^[a-zA-Z0-9_]+$/', $focus_form_name)
        && preg_match('/^[a-zA-Z0-9_]+$/', $focus_form_field)) {
      echo 'onLoad="self.focus();document.'.$focus_form_name.".".$focus_form_field.'.focus()"';
    }
  } ?> >
<table class="opac-shell" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="opac-header-cell">
      <header class="opac-header">
        <div class="opac-brand">
          <img class="opac-brand-logo" src="../images/logofatecgru.png" alt="Fatec Guarulhos, Centro Paula Souza e Governo do Estado de São Paulo">
          <div class="opac-library-name"><?php echo H(OBIB_LIBRARY_NAME); ?></div>
        </div>
        <div class="opac-library-info">
          <div class="opac-info-item">
            <span class="opac-info-label"><?php echo $headerLoc->getText("headerTodaysDate"); ?></span>
            <span><?php echo H(date($headerLoc->getText("headerDateFormat")));?></span>
          </div>
          <?php if (OBIB_LIBRARY_HOURS != "") { ?>
          <div class="opac-info-item">
            <span class="opac-info-label"><?php echo $headerLoc->getText("headerLibraryHours"); ?></span>
            <span><?php echo H(OBIB_LIBRARY_HOURS);?></span>
          </div>
          <?php } ?>
          <?php if (OBIB_LIBRARY_PHONE != "") { ?>
          <div class="opac-info-item">
            <span class="opac-info-label"><?php echo $headerLoc->getText("headerLibraryPhone"); ?></span>
            <span><?php echo H(OBIB_LIBRARY_PHONE);?></span>
          </div>
          <?php } ?>
        </div>
      </header>
    </td>
  </tr>
  <tr>
    <td class="opac-nav-cell">
      <nav class="opac-nav">
        <div class="opac-nav-links">
          <?php include("../navbars/opac.php"); ?>
        </div>
      </nav>
    </td>
  </tr>
  <tr>
    <td class="opac-main-cell">
      <font class="primary">
