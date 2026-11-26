<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../classes/Localize.php");
  $navLoc = new Localize(OBIB_LOCALE,"navbars");
  $opacAppPath = rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');
?>


<div class="opac-nav-utilities">
  <a href="javascript:popSecondary('../shared/help.php<?php if (isset($helpPage)) echo "?page=".H(addslashes(U($helpPage))); ?>')"><?php echo $navLoc->getText("Help"); ?></a>
  <a href="<?php echo H($opacAppPath . '/shared/loginform.php'); ?>">Área administrativa</a>
</div>
<div class="opac-nav-primary">
  <?php if ($nav == "home") { ?>
    <a href="../opac/index.php<?php if (isset($lookup) && $lookup == "Y") echo "?lookup=Y"; ?>" class="alt1"><?php echo $navLoc->getText("catalogSearch1"); ?></a>
  <?php } else { ?>
    <a href="../opac/index.php<?php if (isset($lookup) && $lookup == "Y") echo "?lookup=Y"; ?>" class="alt1"><?php echo $navLoc->getText("catalogSearch2"); ?></a>
  <?php } ?>

  <?php if ($nav == "search") { ?>
    <span class="opac-nav-current">&raquo; <?php echo $navLoc->getText("catalogResults"); ?></span>
  <?php } ?>

  <?php if ($nav == "view") { ?>
    <span class="opac-nav-current">&raquo; <?php echo $navLoc->getText("catalogBibInfo"); ?></span>
  <?php } ?>
</div>
