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
#*  Translation text used on multiple pages
#****************************************************************************
$trans["reportsCancel"]            = "\$text = 'Cancelar';";

#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHdr"]                 = "\$text = 'Relatórios';";
$trans["indexDesc"]                = "\$text = 'Use a lista de relatórios ou etiquetas localizada na área de navegação à esquerda para produzir relatórios ou etiquetas.';";

#****************************************************************************
#*  Translation text for page report_list.php
#****************************************************************************
$trans["reportListHdr"]            = "\$text = 'Lista de relatórios';";
$trans["reportListDesc"]           = "\$text = 'Escolha um dos seguintes links para executar um relatório.';";
$trans["reportListXmlErr"]         = "\$text = 'Ocorreu um erro ao analisar a definição XML do relatório.';";
$trans["reportListCannotRead"]     = "\$text = 'Não é possível ler o arquivo: %fileName%';";

#****************************************************************************
#*  Translation text for page label_list.php
#****************************************************************************
$trans["labelListHdr"]             = "\$text = 'Lista de etiquetas';";
$trans["labelListDesc"]            = "\$text = 'Escolha um dos seguintes links para produzir etiquetas em formato PDF.';";
$trans["displayLabelsXmlErr"]      = "\$text = 'Ocorreu um erro ao analisar a definição XML do relatório. Erro = ';";

#****************************************************************************
#*  Translation text for page letter_list.php
#****************************************************************************
$trans["letterListHdr"]            = "\$text = 'Lista de cartas';";
$trans["letterListDesc"]           = "\$text = 'Escolha um dos seguintes links para produzir cartas em formato PDF.';";
$trans["displayLettersXmlErr"]     = "\$text = 'Ocorreu um erro ao analisar a definição XML do relatório. Erro = ';";

#****************************************************************************
#*  Translation text for page report_criteria.php
#****************************************************************************
$trans["reportCriteriaHead1"]      = "\$text = 'Critérios de pesquisa do relatório (opcional)';";
$trans["reportCriteriaHead2"]      = "\$text = 'Ordem de classificação do relatório (opcional)';";
$trans["reportCriteriaHead3"]      = "\$text = 'Tipo de saída do relatório';";
$trans["reportCriteriaCrit1"]      = "\$text = 'Critério 1:';";
$trans["reportCriteriaCrit2"]      = "\$text = 'Critério 2:';";
$trans["reportCriteriaCrit3"]      = "\$text = 'Critério 3:';";
$trans["reportCriteriaCrit4"]      = "\$text = 'Critério 4:';";
$trans["reportCriteriaEQ"]         = "\$text = '=';";
$trans["reportCriteriaNE"]         = "\$text = 'diferente de';";
$trans["reportCriteriaLT"]         = "\$text = '&lt;';";
$trans["reportCriteriaGT"]         = "\$text = '&gt;';";
$trans["reportCriteriaLE"]         = "\$text = '&lt; ou =';";
$trans["reportCriteriaGE"]         = "\$text = '&gt; ou =';";
$trans["reportCriteriaBT"]         = "\$text = 'entre';";
$trans["reportCriteriaAnd"]        = "\$text = 'e';";
$trans["reportCriteriaRunReport"]  = "\$text = 'Executar relatório';";
$trans["reportCriteriaSortCrit1"]  = "\$text = 'Ordenar 1:';";
$trans["reportCriteriaSortCrit2"]  = "\$text = 'Ordenar 2:';";
$trans["reportCriteriaSortCrit3"]  = "\$text = 'Ordenar 3:';";
$trans["reportCriteriaAscending"]  = "\$text = 'Ascendente';";
$trans["reportCriteriaDescending"] = "\$text = 'Descendente';";
$trans["reportCriteriaStartOnLabel"] = "\$text = 'Iniciar impressão na etiqueta:';";
$trans["reportCriteriaOutput"]     = "\$text = 'Tipo de saída:';";
$trans["reportCriteriaOutputHTML"] = "\$text = 'HTML';";
$trans["reportCriteriaOutputCSV"]  = "\$text = 'CSV';";

#****************************************************************************
#*  Translation text for page run_report.php
#****************************************************************************
$trans["runReportReturnLink1"]     = "\$text = 'Critérios de seleção do relatório';";
$trans["runReportReturnLink2"]     = "\$text = 'Lista de relatórios';";
$trans["runReportTotal"]           = "\$text = 'Total de linhas:';";

#****************************************************************************
#*  Translation text for page display_labels.php
#****************************************************************************
$trans["displayLabelsStartOnLblErr"] = "\$text = 'O campo deve ser numérico.';";
$trans["displayLabelsXmlErr"]      = "\$text = 'Ocorreu um erro ao analisar a definição XML do relatório. Erro = ';";
$trans["displayLabelsCannotRead"]  = "\$text = 'Não é possível ler o arquivo de etiquetas: %fileName%';";

#****************************************************************************
#*  Translation text for page noauth.php
#****************************************************************************
$trans["noauthMsg"]                = "\$text = 'Você não está autorizado a usar a seção Relatórios.';";

#****************************************************************************
#*  Report Titles
#****************************************************************************
$trans["reportHolds"]              = "\$text = 'Solicitações de reserva contendo informações de contato dos membros';";
$trans["reportCheckouts"]          = "\$text = 'Lista de empréstimos';";
$trans["Over Due Letters"]         = "\$text = 'Cartas de atraso';";
$trans["reportLabels"]             = "\$text = 'Lista de impressão de etiquetas';";
$trans["popularBiblios"]           = "\$text = 'Materiais bibliográficos mais populares';";
$trans["overdueList"]              = "\$text = 'Lista de membros com empréstimos em atraso';";
$trans["balanceDueList"]           = "\$text = 'Lista de membros com saldo devedor';";

#****************************************************************************
#*  Label Titles
#****************************************************************************
$trans["labelsMulti"]              = "\$text = 'Exemplo de etiquetas múltiplas';";
$trans["labelsSimple"]             = "\$text = 'Exemplo de etiqueta simples';";

#****************************************************************************
#*  Column Text
#****************************************************************************
$trans["biblio.bibid"]             = "\$text = 'ID bibliográfico';";
$trans["biblio.create_dt"]         = "\$text = 'Data de inclusão';";
$trans["biblio.last_change_dt"]    = "\$text = 'Última modificação';";
$trans["biblio.material_cd"]       = "\$text = 'Código do material';";
$trans["biblio.collection_cd"]     = "\$text = 'Coleção';";
$trans["biblio.call_nmbr1"]        = "\$text = 'Número de chamada 1';";
$trans["biblio.call_nmbr2"]        = "\$text = 'Número de chamada 2';";
$trans["biblio.call_nmbr3"]        = "\$text = 'Número de chamada 3';";
$trans["biblio.title_remainder"]   = "\$text = 'Subtítulo';";
$trans["biblio.responsibility_stmt"] = "\$text = 'Indicação de responsabilidade, tradutor etc.:';";
$trans["biblio.opac_flg"]          = "\$text = 'Exibir no OPAC';";

$trans["biblio_copy.barcode_nmbr"] = "\$text = 'Código de barras';";
$trans["biblio.title"]             = "\$text = 'Título';";
$trans["biblio.author"]            = "\$text = 'Autor';";
$trans["biblio_copy.status_begin_dt"] = "\$text = 'Data inicial da situação';";
$trans["biblio_copy.due_back_dt"]  = "\$text = 'Data de devolução';";
$trans["member.mbrid"]             = "\$text = 'ID do usuário';";
$trans["member.barcode_nmbr"]      = "\$text = 'Código de barras do usuário';";
$trans["member.last_name"]         = "\$text = 'Sobrenome';";
$trans["member.first_name"]        = "\$text = 'Nome';";
$trans["member.address"]           = "\$text = 'Endereço';";
$trans["biblio_hold.hold_begin_dt"] = "\$text = 'Data inicial da reserva';";
$trans["member.home_phone"]        = "\$text = 'Telefone residencial';";
$trans["member.work_phone"]        = "\$text = 'Telefone comercial';";
$trans["member.email"]             = "\$text = 'E-mail';";
$trans["biblio_status_dm.description"] = "\$text = 'Situação';";
$trans["settings.library_name"]    = "\$text = 'Nome da biblioteca';";
$trans["settings.library_hours"]   = "\$text = 'Horário da biblioteca';";
$trans["settings.library_phone"]   = "\$text = 'Telefone da biblioteca';";
$trans["days_late"]                = "\$text = 'Dias de atraso';";
$trans["title"]                    = "\$text = 'Título';";
$trans["author"]                   = "\$text = 'Autor';";
$trans["due_back_dt"]              = "\$text = 'Data de devolução';";
$trans["checkoutCount"]            = "\$text = 'Quantidade de empréstimos';";

#****************************************************************************
#*  Tradução MundoUbuntu
#****************************************************************************
$trans["Cataloging"]               = "\$text = 'Catalogação';";
$trans["Circulation"]              = "\$text = 'Circulação';";
$trans["Statistics"]               = "\$text = 'Estatísticas';";
$trans["Acquisition"]              = "\$text = 'Aquisição';";
$trans["Copy Search"]              = "\$text = 'Busca de cópias';";
$trans["Duplicate Titles"]         = "\$text = 'Títulos duplicados';";
$trans["Item Checkout History"]    = "\$text = 'Histórico de empréstimos de itens';";
$trans["No results found."]        = "\$text = 'Nenhum resultado encontrado.';";
$trans["Member Search"]            = "\$text = 'Busca de membros';";
$trans["Most Popular Authors"]     = "\$text = 'Autores mais populares';";
$trans["Periodic Checkout Count"]  = "\$text = 'Quantidade periódica de empréstimos';";
$trans["After (Date or yesterday)"] = "\$text = 'Depois de (data ou ontem)';";
$trans["Before"]                   = "\$text = 'Antes';";
$trans["Collection"]               = "\$text = 'Coleção';";
$trans["Sort By"]                  = "\$text = 'Ordenar por';";
$trans["Format"]                   = "\$text = 'Formato';";
$trans["Submit"]                   = "\$text = 'Enviar';";
$trans["Barcode Starts With"]      = "\$text = 'Código de barras começa com';";
$trans["List of Barcodes (spaced)"] = "\$text = 'Lista de códigos de barras (separados por espaço)';";
$trans["Newer than (Date or today)"] = "\$text = 'Mais recentes que (data ou hoje)';";
$trans["Duplicate Criteria"]       = "\$text = 'Critério de duplicação';";
$trans["Name Contains"]            = "\$text = 'Nome contém';";
$trans["Address or Phone or Email Contains"] = "\$text = 'Endereço, telefone ou e-mail contém';";
$trans["Call Number"]              = "\$text = 'Número de chamada';";
$trans["As of"]                    = "\$text = 'Até a data de';";
$trans["Out since"]                = "\$text = 'Emprestado desde';";
$trans["Due before"]               = "\$text = 'Vencimento anterior a';";
$trans["Minimum balance"]          = "\$text = 'Saldo mínimo';";
$trans["Placed before"]            = "\$text = 'Criado antes de';";
$trans["Placed since"]             = "\$text = 'Criado desde';";
$trans["Group By"]                 = "\$text = 'Agrupar por';";
$trans["Time Span"]                = "\$text = 'Intervalo de tempo';";
$trans["Labels"]                   = "\$text = 'Etiquetas';";
$trans["Skip Labels"]              = "\$text = 'Pular etiquetas';";

?>