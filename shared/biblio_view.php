<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");
  
  #****************************************************************************
  #*  Checking for get vars.  Go back to form if none found.
  #****************************************************************************
  if (count($_GET) == 0) {
    header("Location: ../catalog/index.php");
    exit();
  }

  #****************************************************************************
  #*  Checking for tab name to show OPAC look and feel if searching from OPAC
  #****************************************************************************
  if (isset($_GET["tab"])) {
    $tab = $_GET["tab"];
  } else {
    $tab = "cataloging";
  }

  $nav = "view";
  if ($tab != "opac") {
    require_once("../shared/logincheck.php");
  }
  require_once("../classes/Biblio.php");
  require_once("../classes/BiblioQuery.php");
  require_once("../classes/BiblioCopy.php");
  require_once("../classes/BiblioCopyQuery.php");
  require_once("../classes/DmQuery.php");
  require_once("../classes/UsmarcTagDm.php");
  require_once("../classes/UsmarcTagDmQuery.php");
  require_once("../classes/UsmarcSubfieldDm.php");
  require_once("../classes/UsmarcSubfieldDmQuery.php");
  require_once("../functions/marcFuncs.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,"shared");


  #****************************************************************************
  #*  Retrieving get var
  #****************************************************************************
  $bibid = $_GET["bibid"];
  if (isset($_GET["msg"])) {
    $msg = "<font class=\"error\">".H($_GET["msg"])."</font><br><br>";
  } else {
    $msg = "";
  }

  #****************************************************************************
  #*  Loading a few domain tables into associative arrays
  #****************************************************************************
  $dmQ = new DmQuery();
  $dmQ->connect();
  $collectionDm = $dmQ->getAssoc("collection_dm");
  $materialTypeDm = $dmQ->getAssoc("material_type_dm");
  if ($tab == "opac") {
    $materialImageFiles = $dmQ->getAssoc("material_type_dm", "image_file");
  }
  $biblioStatusDm = $dmQ->getAssoc("biblio_status_dm");
  $dmQ->close();

  $marcTagDmQ = new UsmarcTagDmQuery();
  $marcTagDmQ->connect();
  if ($marcTagDmQ->errorOccurred()) {
    $marcTagDmQ->close();
    displayErrorPage($marcTagDmQ);
  }
  $marcTagDmQ->execSelect();
  if ($marcTagDmQ->errorOccurred()) {
    $marcTagDmQ->close();
    displayErrorPage($marcTagDmQ);
  }
  $marcTags = $marcTagDmQ->fetchRows();
  $marcTagDmQ->close();

  $marcSubfldDmQ = new UsmarcSubfieldDmQuery();
  $marcSubfldDmQ->connect();
  if ($marcSubfldDmQ->errorOccurred()) {
    $marcSubfldDmQ->close();
    displayErrorPage($marcSubfldDmQ);
  }
  $marcSubfldDmQ->execSelect();
  if ($marcSubfldDmQ->errorOccurred()) {
    $marcSubfldDmQ->close();
    displayErrorPage($marcSubfldDmQ);
  }
  $marcSubflds = $marcSubfldDmQ->fetchRows();
  $marcSubfldDmQ->close();


  #****************************************************************************
  #*  Search database
  #****************************************************************************
  $biblioQ = new BiblioQuery();
  $biblioQ->connect();
  if ($biblioQ->errorOccurred()) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  if (!$biblio = $biblioQ->doQuery($bibid, $tab)) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  $biblioFlds = $biblio->getBiblioFields();

  #**************************************************************************
  #*  Show bibliography info.
  #**************************************************************************
  if ($tab == "opac") {
    require_once("../shared/header_opac.php");
    if (!$biblio->showInOpac()) {
      $biblio = $biblioQ->doQuery($bibid=0);
      $biblioFlds = $biblio->getBiblioFields();
    }
  } else {
    require_once("../shared/header.php");
  }

  if ($tab == "opac") {
    $materialCd = $biblio->getMaterialCd();
    $materialLabel = isset($materialTypeDm[$materialCd]) ? $materialTypeDm[$materialCd] : $materialCd;
    $collectionCd = $biblio->getCollectionCd();
    $collectionLabel = isset($collectionDm[$collectionCd]) ? $collectionDm[$collectionCd] : "";
    $callNumber = trim($biblio->getCallNmbr1()." ".$biblio->getCallNmbr2()." ".$biblio->getCallNmbr3());
    $title = isset($biblioFlds["245a"]) ? trim($biblioFlds["245a"]->getFieldData()) : "";
    $author = isset($biblioFlds["100a"]) ? trim($biblioFlds["100a"]->getFieldData()) : "";
?>
<main class="opac-detail">
  <?php if ($msg != "") { ?><div class="opac-message" role="status"><?php echo $msg; ?></div><?php } ?>
  <article class="opac-detail-card">
    <header class="opac-detail-heading">
      <?php if (isset($materialImageFiles[$materialCd]) && $materialImageFiles[$materialCd] != "") { ?>
        <img class="opac-detail-material-icon" src="../images/<?php echo HURL($materialImageFiles[$materialCd]); ?>" alt="<?php echo H($materialLabel); ?>" width="32" height="32">
      <?php } ?>
      <div>
        <p class="opac-detail-eyebrow"><?php echo H($materialLabel); ?></p>
        <h1><?php echo H($title); ?></h1>
        <?php if ($author != "") { ?><p class="opac-detail-author"><?php echo H($author); ?></p><?php } ?>
      </div>
    </header>

    <section class="opac-detail-section" aria-labelledby="opac-detail-biblio-title">
      <h2 id="opac-detail-biblio-title"><?php echo $loc->getText("biblioViewTble1Hdr"); ?></h2>
      <dl class="opac-detail-fields">
        <?php if ($materialLabel != "") { ?><div><dt><?php echo $loc->getText("biblioViewMaterialType"); ?></dt><dd><?php echo H($materialLabel); ?></dd></div><?php } ?>
        <?php if ($collectionLabel != "") { ?><div><dt><?php echo $loc->getText("biblioViewCollection"); ?></dt><dd><?php echo H($collectionLabel); ?></dd></div><?php } ?>
        <?php if ($callNumber != "") { ?><div><dt><?php echo $loc->getText("biblioViewCallNmbr"); ?></dt><dd><?php echo H($callNumber); ?></dd></div><?php } ?>
        <?php foreach (array("245b", "245c") as $fieldKey) { if (isset($biblioFlds[$fieldKey]) && trim($biblioFlds[$fieldKey]->getFieldData()) != "") { ?>
          <div><dt><?php printUsmarcText(substr($fieldKey, 0, 3), substr($fieldKey, 3), $marcTags, $marcSubflds, FALSE); ?></dt><dd><?php echo H($biblioFlds[$fieldKey]->getFieldData()); ?></dd></div>
        <?php }} ?>
        <div><dt><?php echo $loc->getText("biblioViewOpacFlg"); ?></dt><dd><?php echo $biblio->showInOpac() ? $loc->getText("biblioViewYes") : $loc->getText("biblioViewNo"); ?></dd></div>
      </dl>
    </section>

    <section class="opac-detail-section" aria-labelledby="opac-detail-copies-title">
      <h2 id="opac-detail-copies-title"><?php echo $loc->getText("biblioViewTble2Hdr"); ?></h2>
      <?php
        $copyQ = new BiblioCopyQuery();
        $copyQ->connect();
        if ($copyQ->errorOccurred()) { $copyQ->close(); displayErrorPage($copyQ); }
        if (!$copyQ->execSelect($bibid)) { $copyQ->close(); displayErrorPage($copyQ); }
      ?>
      <?php if ($copyQ->getRowCount() == 0) { ?>
        <p class="opac-no-copies"><?php echo $loc->getText("biblioViewNoCopies"); ?></p>
      <?php } else { ?>
        <div class="opac-detail-copies">
        <?php while ($copy = $copyQ->fetchCopy()) {
          $copyStatus = $copy->getStatusCd();
          $copyStatusLabel = isset($biblioStatusDm[$copyStatus]) ? $biblioStatusDm[$copyStatus] : $copyStatus;
        ?>
          <article class="opac-detail-copy">
            <h3>Exemplar <span>#<?php echo H($copy->getCopyid()); ?></span></h3>
            <?php if ($copy->getBarcodeNmbr() != "") { ?><p><strong><?php echo $loc->getText("biblioViewTble2Col1"); ?>:</strong> <span class="opac-copy-barcode"><?php echo H($copy->getBarcodeNmbr()); ?></span></p><?php } ?>
            <?php if ($copy->getCopyDesc() != "") { ?><p><strong><?php echo $loc->getText("biblioViewTble2Col2"); ?>:</strong> <?php echo H($copy->getCopyDesc()); ?></p><?php } ?>
            <?php if ($copyStatusLabel != "") { ?><p><strong><?php echo $loc->getText("biblioViewTble2Col3"); ?>:</strong> <?php echo H($copyStatusLabel); ?></p><?php } ?>
            <?php if ($copy->getStatusBeginDt() != "") { ?><p><strong><?php echo $loc->getText("biblioViewTble2Col4"); ?>:</strong> <?php echo H($copy->getStatusBeginDt()); ?></p><?php } ?>
            <?php if ($copy->getDueBackDt() != "") { ?><p><strong><?php echo $loc->getText("biblioViewTble2Col5"); ?>:</strong> <?php echo H($copy->getDueBackDt()); ?></p><?php } ?>
            <?php if (isset($_GET["lookup"]) && $_GET["lookup"] == "Y" && $copy->getBarcodeNmbr() != "") { ?>
              <p class="opac-detail-copy-actions"><a href="javascript:returnLookup('barcodesearch','barcodeNmbr','<?php echo H(addslashes($copy->getBarcodeNmbr())); ?>')"><?php echo $loc->getText("biblioSearchOutIn"); ?></a> <span aria-hidden="true">|</span> <a href="javascript:returnLookup('holdForm','holdBarcodeNmbr','<?php echo H(addslashes($copy->getBarcodeNmbr())); ?>')"><?php echo $loc->getText("biblioSearchHold"); ?></a></p>
            <?php } ?>
          </article>
        <?php } ?>
        </div>
      <?php } $copyQ->close(); ?>
    </section>

    <section class="opac-detail-section" aria-labelledby="opac-detail-additional-title">
      <h2 id="opac-detail-additional-title"><?php echo $loc->getText("biblioViewTble3Hdr"); ?></h2>
      <?php $displayCount = 0; ?>
      <dl class="opac-detail-fields">
      <?php foreach ($biblioFlds as $key => $field) {
        $fieldValue = trim($field->getFieldData());
        if ($fieldValue != "" && $key != "245a" && $key != "245b" && $key != "245c" && $key != "100a") {
          $displayCount++;
      ?>
        <div><dt><?php printUsmarcText($field->getTag(), $field->getSubfieldCd(), $marcTags, $marcSubflds, FALSE); ?></dt><dd><?php echo H($fieldValue); ?></dd></div>
      <?php }} ?>
      </dl>
      <?php if ($displayCount == 0) { ?><p><?php echo $loc->getText("biblioViewNoAddInfo"); ?></p><?php } ?>
    </section>
  </article>
</main>
<?php require_once("../shared/footer.php"); exit();
  }

?>

<?php echo $msg ?>
<table class="primary">
  <tr>
    <th align="left" colspan="2" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble1Hdr"); ?>:
    </th>
  </tr>
  <tr>	
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewMaterialType"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewCollection"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H(isset($collectionDm[$biblio->getCollectionCd()]) ? $collectionDm[$biblio->getCollectionCd()] : "");?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("biblioViewCallNmbr"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H($biblio->getCallNmbr1()); ?>
      <?php echo H($biblio->getCallNmbr2()); ?>
      <?php echo H($biblio->getCallNmbr3()); ?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(245,"a",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245a"])) echo H($biblioFlds["245a"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(245,"b",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245b"])) echo H($biblioFlds["245b"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(100,"a",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["100a"])) echo H($biblioFlds["100a"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php printUsmarcText(245,"c",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245c"])) echo H($biblioFlds["245c"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewOpacFlg"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php if ($biblio->showInOpac()) {
        echo $loc->getText("biblioViewYes");
      } else {
        echo $loc->getText("biblioViewNo");
      }?>
    </td>
  </tr>
</table>
<br />





<?php
  #****************************************************************************
  #*  Show copy information
  #****************************************************************************
  if ($tab == "cataloging") { ?>
    <a href="../catalog/biblio_copy_new_form.php?bibid=<?php echo HURL($bibid);?>&reset=Y">
      <?php echo $loc->getText("biblioViewNewCopy"); ?></a><br/>
    <?php
    $copyCols=7;
  } else {
    $copyCols=5;
  }

  $copyQ = new BiblioCopyQuery();
  $copyQ->connect();
  if ($copyQ->errorOccurred()) {
    $copyQ->close();
    displayErrorPage($copyQ);
  }
  if (!$copy = $copyQ->execSelect($bibid)) {
    $copyQ->close();
    displayErrorPage($copyQ);
  }
?>

<h1><?php echo $loc->getText("biblioViewTble2Hdr"); ?>:</h1>
<table class="primary">
  <tr>
    <?php if ($tab == "cataloging") { ?>
      <th colspan="2" nowrap="yes">
        <?php echo $loc->getText("biblioViewTble2ColFunc"); ?>
      </th>
    <?php } ?>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col1"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col2"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col3"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col4"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col5"); ?>
    </th>
  </tr>
  <?php
    if ($copyQ->getRowCount() == 0) { ?>
      <tr>
        <td valign="top" colspan="<?php echo H($copyCols); ?>" class="primary" colspan="2">
          <?php echo $loc->getText("biblioViewNoCopies"); ?>
        </td>
      </tr>      
    <?php } else {
      $row_class = "primary";
      while ($copy = $copyQ->fetchCopy()) {
  ?>
    <tr>
      <?php if ($tab == "cataloging") { ?>
        <td valign="top" class="<?php echo H($row_class);?>">
          <a href="../catalog/biblio_copy_edit_form.php?bibid=<?php echo HURL($copy->getBibid());?>&amp;copyid=<?php echo H($copy->getCopyid());?>" class="<?php echo H($row_class);?>"><?php echo $loc->getText("biblioViewTble2Coledit"); ?></a>
        </td>
        <td valign="top" class="<?php echo H($row_class);?>">
          <a href="../catalog/biblio_copy_del_confirm.php?bibid=<?php echo HURL($copy->getBibid());?>&amp;copyid=<?php echo HURL($copy->getCopyid());?>" class="<?php echo H($row_class);?>"><?php echo $loc->getText("biblioViewTble2Coldel"); ?></a>
        </td>
      <?php } ?>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getBarcodeNmbr()); ?>
      </td>
      <td valign="top" class="<?php echo H($copy->getCopyDesc()); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($biblioStatusDm[$copy->getStatusCd()]); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getStatusBeginDt()); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getDueBackDt()); ?>
      </td>
    </tr>      
  <?php
        # swap row color
        if ($row_class == "primary") {
          $row_class = "alt1";
        } else {
          $row_class = "primary";
        }
      }
      $copyQ->close();
    } ?>
</table>





<br />
<table class="primary">
  <tr>
    <th align="left" colspan="2" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble3Hdr"); ?>:
    </th>
  </tr>
  <?php
    $displayCount = 0;
    foreach ($biblioFlds as $key => $field) {
      if (($field->getFieldData() != "") 
        && ($key != "245a")
        && ($key != "245b")
        && ($key != "245c")
        && ($key != "100a")) {
        $displayCount = $displayCount + 1;
  ?>
        <tr>
          <td valign="top" class="primary">
            <?php printUsmarcText($field->getTag(),$field->getSubfieldCd(),$marcTags, $marcSubflds, FALSE);?>:
          </td>
          <td valign="top" class="primary"><?php echo H($field->getFieldData()); ?></td>
        </tr>      
  <?php
      }
    }
    if ($displayCount == 0) {
  ?>
        <tr>
          <td valign="top" class="primary" colspan="2">
            <?php echo $loc->getText("biblioViewNoAddInfo"); ?>
          </td>
        </tr>      
  <?php
    }
  ?>
</table>


<?php require_once("../shared/footer.php"); ?>
