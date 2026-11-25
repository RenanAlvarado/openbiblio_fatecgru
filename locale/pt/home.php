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
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHeading"]       = "\$text='Bem-vindo ao OpenBiblio';";
$trans["indexIntro"]         = "\$text=
  'Utilize as guias de navegação na parte superior de cada página para acessar as seguintes seções da biblioteca.';";

$trans["indexTab"]           = "\$text='Seção';";
$trans["indexDesc"]          = "\$text='Descrição';";

$trans["indexCirc"]          = "\$text='Circulação';";
$trans["indexCircDesc1"]     = "\$text='Utilize esta seção para gerenciar os registros dos usuários.';";
$trans["indexCircDesc2"]     = "\$text='Gerenciamento de usuários (novo, pesquisar, editar e excluir).';";
$trans["indexCircDesc3"]     = "\$text='Empréstimos, reservas, contas dos usuários e histórico de empréstimos.';";
$trans["indexCircDesc4"]     = "\$text='Devolução de materiais bibliográficos.';";
//$trans["indexCircDesc5"]     = "\$text='Pagamentos de taxas pelos usuários';";

$trans["indexCat"]           = "\$text='Catalogação';";
$trans["indexCatDesc1"]      = "\$text='Utilize esta seção para gerenciar os registros bibliográficos.';";
$trans["indexCatDesc2"]      = "\$text='Gerenciamento de registros bibliográficos (novo, pesquisar, editar e excluir).';";
//$trans["indexCatDesc3"]      = "\$text='Importar registros bibliográficos no formato USMARC';";

$trans["indexAdmin"]         = "\$text='Administração';";
$trans["indexAdminDesc1"]    = "\$text='Utilize esta seção para gerenciar os registros administrativos.';";
$trans["indexAdminDesc2"]    = "\$text='Gerenciamento de funcionários (novo, editar, alterar senha e excluir).';";
$trans["indexAdminDesc3"]    = "\$text='Configurações gerais da biblioteca.';";
$trans["indexAdminDesc5"]    = "\$text='Lista dos tipos de materiais da biblioteca.';";
$trans["indexAdminDesc4"]    = "\$text='Lista de coleções.';";
$trans["indexAdminDesc6"]    = "\$text='Editor de temas da biblioteca.';";

$trans["indexReports"]       = "\$text='Relatórios';";
$trans["indexReportsDesc1"]  = "\$text='Utilize esta seção para gerar relatórios com os dados da biblioteca.';";
$trans["indexReportsDesc2"]  = "\$text='Relatórios.';";
$trans["indexReportsDesc3"]  = "\$text='Estatísticas.';";

?>