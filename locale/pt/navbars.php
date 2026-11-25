<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

/**********************************************************************************
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *   Allowing translators to execute PHP code within the transFunc string
 *   provides the maximum amount of flexibility to format the language syntax.
 *
 *   Formatting rules:
 *   - Resulting translation string must be stored in a variable called $text.
 *   - Input arguments must be surrounded by % characters (i.e. %pageCount%).
 *   - A backslash ('\') needs to be placed before any special PHP characters
 *     (such as $, ", etc.) within the PHP translation code.
 *
 **********************************************************************************
 */

#****************************************************************************
#*  Translation text shared by various php files under the navbars dir
#****************************************************************************
$trans["login"]                    = "\$text = 'Entrar no sistema';";
$trans["logout"]                   = "\$text = 'Sair do sistema';";
$trans["Logout"]                   = "\$text = 'Sair do sistema';";
$trans["help"]                     = "\$text = 'Ajuda';";

#****************************************************************************
#*  Translation text for page home.php
#****************************************************************************
$trans["homeHomeLink"]             = "\$text = 'Início';";
$trans["homeLicenseLink"]          = "\$text = 'Licença';";

#****************************************************************************
#*  Translation text for page admin.php
#****************************************************************************
$trans["adminSummary"]              = "\$text = 'Painel de administração';";
$trans["adminStaff"]                = "\$text = 'Equipe de administração';";
$trans["adminSettings"]             = "\$text = 'Configurações da biblioteca';";
$trans["Member Types"]              = "\$text = 'Tipos de membros';";
$trans["Member Fields"]             = "\$text = 'Campos de membros';";
$trans["Member Fields "]            = "\$text = 'Campos de membros';";
$trans["Copy Fields"]               = "\$text = 'Campos de cópias';";
$trans["Copy Fields "]              = "\$text = 'Campos de cópias';";
$trans["adminMaterialTypes"]        = "\$text = 'Tipos de materiais';";
$trans["adminCollections"]          = "\$text = 'Coleções';";
$trans["Checkout Privs"]            = "\$text = 'Regras de empréstimos';";
$trans["adminThemes"]               = "\$text = 'Temas';";
$trans["adminTranslation"]          = "\$text = 'Traduções';";

#****************************************************************************
#*  Translation text for page cataloging.php
#****************************************************************************
$trans["catalogSummary"]            = "\$text = 'Resumo do catálogo';";
$trans["catalogSearch1"]            = "\$text = 'Pesquisa bibliográfica';";
$trans["catalogSearch2"]            = "\$text = 'Pesquisa bibliográfica';";
$trans["catalogResults"]            = "\$text = 'Resultados da pesquisa';";
$trans["catalogBibInfo"]            = "\$text = 'Informações bibliográficas';";
$trans["catalogBibEdit"]            = "\$text = 'Edição básica';";
$trans["catalogBibEditMarc"]        = "\$text = 'Edição MARC';";
$trans["catalogBibMarcNewFld"]      = "\$text = 'Novo campo MARC';";
$trans["catalogBibMarcNewFldShrt"]  = "\$text = 'Novo MARC';";
$trans["catalogBibMarcEditFld"]     = "\$text = 'Editar campo MARC';";
$trans["catalogCopyNew"]            = "\$text = 'Nova cópia';";
$trans["catalogCopyEdit"]           = "\$text = 'Editar cópia';";
$trans["catalogHolds"]              = "\$text = 'Solicitações de reserva';";
$trans["catalogDelete"]             = "\$text = 'Excluir';";
$trans["catalogBibNewLike"]         = "\$text = 'Novo a partir deste';";
$trans["catalogBibNew"]             = "\$text = 'Novo registro bibliográfico';";
$trans["Upload Marc Data"]          = "\$text = 'Enviar dados MARC';";

#****************************************************************************
#*  Translation text for page reports.php
#****************************************************************************
$trans["reportsSummary"]            = "\$text = 'Resumo de relatórios';";
$trans["reportsReportListLink"]     = "\$text = 'Lista de relatórios';";
$trans["reportsLabelsLink"]         = "\$text = 'Imprimir etiquetas';";
$trans["reportsLettersLink"]        = "\$text = 'Imprimir cartas';";
$trans["Report List"]               = "\$text = 'Lista de relatórios';";
$trans["Print List"]                = "\$text = 'Lista de impressão';";
$trans["Help"]                      = "\$text = 'Ajuda';";

#****************************************************************************
#*  Translation text for page opac.php
#****************************************************************************
$trans["catalogSearch1"]            = "\$text = 'Pesquisa';";
$trans["catalogSearch2"]            = "\$text = 'Pesquisa bibliográfica';";
$trans["catalogResults"]            = "\$text = 'Resultados da pesquisa';";
$trans["catalogBibInfo"]            = "\$text = 'Informações bibliográficas';";

#****************************************************************************
#*  Additional translations
#****************************************************************************
$trans["memberInfo"]                = "\$text = 'Informações do usuário';";
$trans["memberSearch"]              = "\$text = 'Pesquisar usuário';";
$trans["editInfo"]                  = "\$text = 'Editar informações';";
$trans["checkoutHistory"]           = "\$text = 'Histórico de empréstimos';";
$trans["account"]                   = "\$text = 'Conta';";
$trans["checkIn"]                   = "\$text = 'Devolução';";
$trans["Offline Circulation"]       = "\$text = 'Circulação manual';";
$trans["newMember"]                 = "\$text = 'Novo usuário';";

?>