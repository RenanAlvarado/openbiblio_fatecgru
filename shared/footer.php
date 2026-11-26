<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  # Be sure we don't get leftovers.
  unset($_SESSION['pageErrors']);
  unset($_SESSION['postVars']);
?>
<footer class="site-footer">
  <div class="site-footer-inner">
    <nav class="site-footer-links">
      <?php if (OBIB_LIBRARY_URL != "") { ?>
        <a href="<?php echo H(OBIB_LIBRARY_URL);?>"><?php echo $headerLoc->getText("footerLibraryHome"); ?></a>
      <?php }
      if (OBIB_OPAC_URL != "") { ?>
        <a href="<?php echo H(OBIB_OPAC_URL);?>"><?php echo $headerLoc->getText("footerOPAC"); ?></a>
      <?php } ?>
      <a href="javascript:popSecondary('../shared/help.php<?php if (isset($helpPage)) echo "?page=".H(addslashes(U($helpPage))); ?>')"><?php echo $headerLoc->getText("footerHelp"); ?></a>
    </nav>

    <a class="site-footer-brand" href="http://obiblio.sourceforge.net/"><img src="../images/powered_by_openbiblio.gif" width="125" height="44" border="0"></a>

    <div class="site-footer-versions">
      <span><?php echo $headerLoc->getText("footerPoweredBy"); ?> <?php echo H(OBIB_CODE_VERSION);?></span>
      <span><?php echo $headerLoc->getText("footerDatabaseVersion"); ?> <?php echo H(OBIB_DB_VERSION);?></span>
    </div>

    <p class="site-footer-copyright"><?php echo $headerLoc->getText("footerCopyright"); ?> &copy; 2002-2014 Dave Stevens, et al.</p>

    <div class="site-footer-credit">
      <span>Adaptado por Renan Amaral @ 2026</span>
      <a href="mailto:renanalvarado123@gmail.com">renanalvarado123@gmail.com</a>
      <a href="https://www.linkedin.com/in/renan-amaral1" target="_blank" rel="noopener noreferrer">LinkedIn</a>
    </div>

    <p class="site-footer-license"><?php echo $headerLoc->getText("footerUnderThe"); ?> <a href="../shared/copying.html"><?php echo $headerLoc->getText("footerGPL"); ?></a></p>
  </div>
</footer>
    </td>
  </tr>
</table>
</body>
</html>
