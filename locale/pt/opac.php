<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

/**********************************************************************************
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *   Allowing translators the ability to execute php code within the transFunc string
 *   provides the maximum amount of flexibility to format the language syntax.
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
 *   Example Containing a PHP If Statement and Argument Substitution:
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
$trans["opac_Header"]        = "\$text='Catálogo Online de Acesso Público (OPAC)';";
$trans["opac_WelcomeMsg"]    = "\$text=
  'Bem-vindo ao nosso Catálogo de Acesso Público.
   Pesquise em nosso catálogo para encontrar materiais bibliográficos.';";
$trans["opac_SearchTitle"]   = "\$text='Pesquisar bibliografia por frase de pesquisa:';";
$trans["opac_Keyword"]       = "\$text='Palavra-chave';";
$trans["opac_Title"]         = "\$text='Título';";
$trans["opac_Author"]        = "\$text='Autor';";
$trans["opac_Subject"]       = "\$text='Assunto';";
$trans["opac_Callno"]        = "\$text='Número de chamada';";
$trans["opac_Search"]        = "\$text='Pesquisar';";

?>