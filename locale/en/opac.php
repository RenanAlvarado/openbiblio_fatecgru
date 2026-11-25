<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
/**********************************************************************************
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *   Allowing translators the ability to execute php code withint the transFunc string
 *   provides the maximum amount of flexibility to format the languange syntax.
 *
 *   Formatting rules:
 *   - Resulting translation string must be stored in a variable called $text.
 *   - Input arguments must be surrounded by % characters (i.e. %pageCount%).
 *   - A backslash ('\') needs to be placed before any special php characters 
 *     (such as $, ", etc.) within the php translation code.
 *
 *   Simple Example:
 *     $trans["homeWelcome"]       = "\$text='Welcome to OpenBiblio';";
 *
 *   Example Containing Argument Substitution:
 *     $trans["searchResult"]      = "\$text='page %page% of %pages%';";
 *
 *   Example Containing a PHP If Statment and Argument Substitution:
 *     $trans["searchResult"]      = 
 *       "if (%items% == 1) {
 *         \$text = '%items% result';
 *       } else {
 *         \$text = '%items% results';
 *       }";
 *
 **********************************************************************************
 */


#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["opac_Header"]        = "\$text='Online Public Access Catalog (OPAC)';";
$trans["opac_WelcomeMsg"]    = "\$text=
  'Welcome to our library\'s online public access catalog.  Search our catalog
   to view bibliography information on holdings we have in our library.';";
$trans["opac_SearchTitle"]   = "\$text='Search Bibliography by Search Phrase:';";
$trans["opac_SearchHeading"] = "\$text='Search Bibliography';";
$trans["opac_SearchTypeLabel"] = "\$text='Search type';";
$trans["opac_AllCollection"] = "\$text='Entire collection';";
$trans["opac_SortLabel"] = "\$text='Sort results by';";
$trans["opac_EmptyCollection"] = "\$text='The public collection has no available records.';";
$trans["opac_CopySingular"] = "\$text='copy';";
$trans["opac_CopyPlural"] = "\$text='copies';";
$trans["opac_Keyword"]       = "\$text='Keyword';";
$trans["opac_Title"]         = "\$text='Title';";
$trans["opac_Author"]        = "\$text='Author';";
$trans["opac_Subject"]       = "\$text='Subject';";
$trans["opac_Callno"]        = "\$text='Call Number';";
$trans["opac_Search"]        = "\$text='Search';";

?>
