<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../classes/Localize.php");
  require_once("../functions/formatFuncs.php");

/******************************************************************************
 * BiblioCopy represents a library bibliography copy record.  Contains business rules for
 * bibliography data validation.
 *
 * @author David Stevens <dave@stevens.name>;
 * @version 1.0
 * @access public
 ******************************************************************************
 */
class BiblioCopy {
  var $_bibid = "";
  var $_copyid = "";
  var $_createDt = "";
  var $_copyDesc = "";
  var $_barcodeNmbr = "";
  var $_barcodeNmbrError = "";
  var $_statusCd = OBIB_DEFAULT_STATUS;
  var $_statusBeginDt = "";
  var $_dueBackDt = "";
  var $_daysLate = "";
  var $_mbrid = "";
  var $_loc;
  var $_renewalCount = "";
  var $_custom = array();

  
	function BiblioCopy() {
		$args = func_get_args();
		call_user_func_array(array($this, '__construct'), $args);
	}
function __construct() {
    $this->_loc = new Localize(OBIB_LOCALE,"classes");
  }

  /****************************************************************************
   * @return boolean true if data is valid, otherwise false.
   * @access public
   ****************************************************************************
   */
  function validateData($validBarco) {
    $valid = true;
    if ($this->_barcodeNmbr == "") {
      $valid = false;
      $this->_barcodeNmbrError = $this->_loc->getText("biblioCopyError1");
    } else if (!preg_match(OBIB_BARCODE_RE, $this->_barcodeNmbr) && $validBarco == "CHECKED") {
      $valid = false;
      $this->_barcodeNmbrError = $this->_loc->getText("biblioCopyError2");
    }
    return $valid;
  }

  function getCustom($field) {
    if (isset($this->_custom[$field])) {
      return $this->_custom[$field];
    }
    return "";
  }
  function setCustom($field, $value) {
    $this->_custom[$field] = $value;
  }
  
  /****************************************************************************
   * Getter methods for all fields
   * @return string
   * @access public
   ****************************************************************************
   */
  function getBibid() {
    return $this->_bibid;
  }
  function getCopyid() {
    return $this->_copyid;
  }
  function getCreateDt() {
    return $this->_createDt;
  }
  function getCopyDesc() {
    return $this->_copyDesc;
  }
  function getBarcodeNmbr() {
    return $this->_barcodeNmbr;
  }
  function getBarcodeNmbrError() {
    return $this->_barcodeNmbrError;
  }
  function getStatusCd() {
    return $this->_statusCd;
  }
  function getStatusBeginDt() {
    return $this->_statusBeginDt;
  }
  function getDueBackDt() {
    return $this->_dueBackDt;
  }
  function getDaysLate() {
    return $this->_daysLate;
  }
  function getMbrid() {
    return $this->_mbrid;
  }
  function getRenewalCount() {
    return $this->_renewalCount;
  }

  /****************************************************************************
   * Setter methods for all fields
   * @param string $value new value to set
   * @return void
   * @access public
   ****************************************************************************
   */
  function setBibid($value) {
    $this->_bibid = trim((string)$value);
  }
  function setCopyid($value) {
    $this->_copyid = trim((string)$value);
  }
  function setCreateDt($value) {
    $this->_createDt = trim((string)$value);
  }
  function setCopyDesc($value) {
    $this->_copyDesc = trim((string)$value);
  }
  function setBarcodeNmbr($value) {
    $this->_barcodeNmbr = trim((string)$value);
  }
  function setStatusCd($value) {
    $this->_statusCd = trim((string)$value);
  }
  function setStatusBeginDt($value) {
    $this->_statusBeginDt = trim((string)$value);
  }
  function setDueBackDt($value) {
    $this->_dueBackDt = trim((string)$value);
  }
  function setDaysLate($value) {
    $this->_daysLate = trim((string)$value);
  }
  function setMbrid($value) {
    $this->_mbrid = trim((string)$value);
  }
  function setRenewalCount($value) {
    $this->_renewalCount = trim((string)$value);
  }
}

?>
