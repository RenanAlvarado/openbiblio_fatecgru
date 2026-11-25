<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

/**********************************************************************************
 *
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *
 *   Formatting rules:
 *   - Resulting translation string must be stored in a variable called $text.
 *   - Input arguments must be surrounded by % characters (i.e. %pageCount%).
 *   - A backslash ('\') needs to be placed before any special PHP characters
 *     (such as $, ", etc.) within the PHP translation code.
 *
 **********************************************************************************/

#****************************************************************************
#*  Common translation text shared among multiple pages
#****************************************************************************
$trans["sharedCancel"]             = "\$text = 'Cancelar';";
$trans["sharedDelete"]             = "\$text = 'Excluir';";

#****************************************************************************
#*  Translation text for page biblio_view.php
#****************************************************************************
$trans["biblioViewTble1Hdr"]       = "\$text = 'Informações Bibliográficas';";
$trans["biblioViewMaterialType"]   = "\$text = 'Tipo de Material';";
$trans["biblioViewCollection"]     = "\$text = 'Coleção';";
$trans["biblioViewCallNmbr"]       = "\$text = 'Número de Chamada';";
$trans["biblioViewTble2Hdr"]       = "\$text = 'Informações das Cópias';";
$trans["biblioViewTble2Col1"]      = "\$text = 'Código de Barras #';";
$trans["biblioViewTble2Col2"]      = "\$text = 'Descrição';";
$trans["biblioViewTble2Col3"]      = "\$text = 'Situação';";
$trans["biblioViewTble2Col4"]      = "\$text = 'Data da Situação';";
$trans["biblioViewTble2Col5"]      = "\$text = 'Vencimento';";
$trans["biblioViewTble2ColFunc"]   = "\$text = 'Função';";
$trans["biblioViewTble2Coldel"]    = "\$text = 'Excluir';";
$trans["biblioViewTble2Coledit"]   = "\$text = 'Editar';";
$trans["biblioViewTble3Hdr"]       = "\$text = 'Informações bibliográficas adicionais';";
$trans["biblioViewNoAddInfo"]      = "\$text = 'Não há informações bibliográficas adicionais disponíveis.';";
$trans["biblioViewNoCopies"]       = "\$text = 'Nenhuma cópia foi criada.';";
$trans["biblioViewOpacFlg"]        = "\$text = 'Mostrar na Pesquisa/OPAC';";
$trans["biblioViewNewCopy"]        = "\$text = 'Adicionar nova cópia';";
$trans["biblioViewNeweCopy"]       = "\$text = 'Adicionar nova cópia eletrônica';";
$trans["biblioViewYes"]            = "\$text = 'Sim';";
$trans["biblioViewNo"]             = "\$text = 'Não';";

#****************************************************************************
#*  Translation text for page biblio_search.php
#****************************************************************************
$trans["biblioSearchNoResults"]    = "\$text = 'Nenhum resultado encontrado.';";
$trans["biblioSearchResults"]      = "\$text = 'Resultados da pesquisa';";
$trans["biblioSearchResultPages"]  = "\$text = 'Páginas de resultados';";
$trans["biblioSearchPrev"]         = "\$text = 'Anterior';";
$trans["biblioSearchNext"]         = "\$text = 'Próximo';";
$trans["biblioSearchResultTxt"]    = "if (%items% == 1) {
                                        \$text = '%items% resultado encontrado.';
                                      } else {
                                        \$text = '%items% resultados encontrados.';
                                      }";
$trans["biblioSearchauthor"]       = "\$text = 'Ordenados por autor';";
$trans["biblioSearchtitle"]        = "\$text = 'Ordenados por título';";
$trans["biblioSearchSortByAuthor"] = "\$text = 'Classificar por autor';";
$trans["biblioSearchSortByTitle"]  = "\$text = 'Classificar por título';";
$trans["biblioSearchTitle"]        = "\$text = 'Título';";
$trans["biblioSearchAuthor"]       = "\$text = 'Autor';";
$trans["biblioSearchMaterial"]     = "\$text = 'Material';";
$trans["biblioSearchCollection"]   = "\$text = 'Coleção';";
$trans["biblioSearchCall"]         = "\$text = 'Número de Chamada';";
$trans["biblioSearchCopyBCode"]    = "\$text = 'Código de barras da cópia';";
$trans["biblioSearchCopyStatus"]   = "\$text = 'Condição';";
$trans["biblioSearchNoCopies"]     = "\$text = 'Não há cópias disponíveis.';";
$trans["biblioSearchHold"]         = "\$text = 'Reservar';";
$trans["biblioSearchOutIn"]        = "\$text = 'Conferir';";
$trans["biblioSearchDetail"]       = "\$text = 'Mostrar informações bibliográficas detalhadas';";
$trans["biblioSearchBCode2Chk"]    = "\$text = 'Verificar código de barras ou preencher formulário';";
$trans["biblioSearchBCode2Hold"]   = "\$text = 'Informar código de barras no formulário de reserva';";

#****************************************************************************
#*  Translation text for page loginform.php
#****************************************************************************
$trans["loginFormTbleHdr"]         = "\$text = 'Colaborador';";
$trans["loginFormUsername"]        = "\$text = 'Usuário';";
$trans["loginFormPassword"]        = "\$text = 'Senha';";
$trans["loginFormLogin"]           = "\$text = 'Entrar';";

#****************************************************************************
#*  Translation text for page hold_del_confirm.php
#****************************************************************************
$trans["holdDelConfirmMsg"]        = "\$text = 'Tem certeza de que deseja excluir esta solicitação de reserva?';";

#****************************************************************************
#*  Translation text for page hold_del.php
#****************************************************************************
$trans["holdDelSuccess"]           = "\$text = 'A solicitação de reserva foi excluída com sucesso.';";

#****************************************************************************
#*  Translation text for page help_header.php
#****************************************************************************
$trans["helpHeaderTitle"]          = "\$text = 'Ajuda';";
$trans["helpHeaderCloseWin"]       = "\$text = 'Fechar janela';";
$trans["helpHeaderContents"]       = "\$text = 'Conteúdo';";
$trans["helpHeaderPrint"]          = "\$text = 'Imprimir';";

$trans["catalogResults"]           = "\$text = 'Resultados da pesquisa';";

#****************************************************************************
#*  Translation text for page header.php and header_opac.php
#****************************************************************************
$trans["headerTodaysDate"]         = "\$text = 'Data de hoje:';";
$trans["headerDateFormat"]         = "\$text = 'M d, Y';";
$trans["headerLibraryHours"]       = "\$text = 'Horário da biblioteca:';";
$trans["headerLibraryPhone"]       = "\$text = 'Telefone da biblioteca:';";
$trans["headerHome"]               = "\$text = 'Início';";
$trans["headerCirculation"]        = "\$text = 'Circulação';";
$trans["headerCataloging"]         = "\$text = 'Catalogação';";
$trans["headerAdmin"]              = "\$text = 'Administração';";
$trans["headerReports"]            = "\$text = 'Relatórios';";

#****************************************************************************
#*  Translation text for page footer.php
#****************************************************************************
$trans["footerLibraryHome"]        = "\$text = 'Página inicial da biblioteca';";
$trans["footerOPAC"]               = "\$text = 'Pesquisa/OPAC';";
$trans["footerHelp"]               = "\$text = 'Ajuda';";
$trans["footerPoweredBy"]          = "\$text = 'Desenvolvido com OpenBiblio versão';";
$trans["footerDatabaseVersion"]    = "\$text = 'Versão do banco de dados';";
$trans["footerCopyright"]          = "\$text = 'Direitos autorais';";
$trans["footerUnderThe"]           = "\$text = 'sob a';";
$trans["footerGPL"]                = "\$text = 'GNU General Public License';";

?>