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
#*  Common translation text shared among multiple pages
#****************************************************************************
$trans["adminSubmit"]              = "\$text = 'Enviar';";
$trans["adminCancel"]              = "\$text = 'Cancelar';";
$trans["adminDelete"]              = "\$text = 'Excluir';";
$trans["adminUpdate"]              = "\$text = 'Atualizar';";
$trans["adminFootnote"]            = "\$text = 'Os campos marcados com %symbol% são obrigatórios.';";

#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHdr"]                 = "\$text = 'Administração';";
$trans["indexDesc"]                = "\$text = 'Utilize as opções de navegação à esquerda para gerenciar a equipe da biblioteca e os registros administrativos.';";

#****************************************************************************
#*  Translation text for page collections*.php
#****************************************************************************
$trans["adminCollections_delReturn"] = "\$text = 'Retornar à lista de coleções';";
$trans["adminCollections_delStart"]  = "\$text = 'Coleção: ';";

#****************************************************************************
#*  Translation text for page collections_del.php
#****************************************************************************
$trans["adminCollections_delEnd"]  = "\$text = ', foi excluída.';";

#****************************************************************************
#*  Translation text for page collections_del_confirm.php
#****************************************************************************
$trans["adminCollections_del_confirmText"] = "\$text = 'Tem certeza de que deseja excluir a coleção: ';";

#****************************************************************************
#*  Translation text for page collections_edit.php
#****************************************************************************
$trans["adminCollections_editEnd"] = "\$text = ', foi atualizada.';";

#****************************************************************************
#*  Translation text for page collections_edit_form.php
#****************************************************************************
$trans["adminCollections_edit_formEditcollection"] = "\$text = 'Editar coleção:';";
$trans["adminCollections_edit_formDescription"] = "\$text = 'Descrição:';";
$trans["adminCollections_edit_formDaysdueback"] = "\$text = 'Dias até a devolução:';";
$trans["adminCollections_edit_formDailyLateFee"] = "\$text = 'Taxa diária por atraso:';";
$trans["adminCollections_edit_formNote"] = "\$text = '*Observação:';";
$trans["adminCollections_edit_formNoteText"] = "\$text = 'Definir os dias até a devolução como zero torna toda a coleção indisponível para empréstimo.';";

#****************************************************************************
#*  Translation text for page collections_list.php
#****************************************************************************
$trans["adminCollections_listAddNewCollection"] = "\$text = 'Adicionar nova coleção';";
$trans["adminCollections_listCollections"] = "\$text = 'Coleções:';";
$trans["adminCollections_listFunction"] = "\$text = 'Ação';";
$trans["adminCollections_listDescription"] = "\$text = 'Descrição';";
$trans["adminCollections_listDaysdueback"] = "\$text = 'Dias até a<br>devolução';";
$trans["adminCollections_listDailylatefee"] = "\$text = 'Taxa diária<br>por atraso';";
$trans["adminCollections_listBibliographycount"] = "\$text = 'Quantidade de<br>registros bibliográficos';";
$trans["adminCollections_listEdit"] = "\$text = 'Editar';";
$trans["adminCollections_listDel"] = "\$text = 'Excluir';";
$trans["adminCollections_ListNote"] = "\$text = '*Observação:';";
$trans["adminCollections_ListNoteText"] = "\$text = 'A opção de exclusão está disponível apenas para coleções que não possuem registros bibliográficos associados. Para excluir uma coleção que possui registros, primeiro altere a coleção desses registros para outra opção.<br>Depois disso, será possível excluir a coleção.';";

#****************************************************************************
#*  Translation text for page collections_new.php
#****************************************************************************
$trans["adminCollections_newAdded"] = "\$text = ', foi adicionada.';";

#****************************************************************************
#*  Translation text for page collections_new_form.php
#****************************************************************************
$trans["adminCollections_new_formAddnewcollection"] = "\$text = 'Adicionar nova coleção:';";
$trans["adminCollections_new_formDescription"] = "\$text = 'Descrição:';";
$trans["adminCollections_new_formDaysdueback"] = "\$text = 'Dias até a devolução:';";
$trans["adminCollections_new_formDailylatefee"] = "\$text = 'Taxa diária por atraso:';";
$trans["adminCollections_new_formNote"] = "\$text = '*Observação:';";
$trans["adminCollections_new_formNoteText"] = "\$text = 'Definir os dias até a devolução como zero torna toda a coleção indisponível para empréstimo.';";

#****************************************************************************
#*  Translation text for page materials_del.php
#****************************************************************************
$trans["admin_materials_delMaterialType"] = "\$text = 'Tipo de material: ';";
$trans["admin_materials_delMaterialdeleted"] = "\$text = ', foi excluído.';";
$trans["admin_materials_Return"] = "\$text = 'Retornar à lista de tipos de materiais';";

#****************************************************************************
#*  Translation text for page materials_del_form.php
#****************************************************************************
$trans["admin_materials_delAreyousure"] = "\$text = 'Tem certeza de que deseja excluir o tipo de material: ';";

#****************************************************************************
#*  Translation text for page materials_edit_form.php
#****************************************************************************
$trans["admin_materials_delEditmaterialtype"] = "\$text = 'Editar tipo de material:';";
$trans["admin_materials_delDescription"] = "\$text = 'Descrição:';";
$trans["admin_materials_delunlimited"] = "\$text = '(Digite zero para ilimitado)';";
$trans["admin_materials_delImagefile"] = "\$text = 'Arquivo de imagem:';";
$trans["admin_materials_delNote"] = "\$text = '*Observação:';";
$trans["admin_materials_delNoteText"] = "\$text = 'Os arquivos de imagem devem estar localizados no diretório openbiblio/images.';";

#****************************************************************************
#*  Translation text for page materials_edit.php
#****************************************************************************
$trans["admin_materials_editEnd"] = "\$text = ', atualizado.';";

#****************************************************************************
#*  Translation text for page materials_list.php
#****************************************************************************
$trans["admin_materials_listAddmaterialtypes"] = "\$text = 'Adicionar novo tipo de material';";
$trans["admin_materials_listMaterialtypes"] = "\$text = 'Tipos de materiais:';";
$trans["admin_materials_listFunction"] = "\$text = 'Ação';";
$trans["admin_materials_listDescription"] = "\$text = 'Descrição';";
$trans["admin_materials_listLimits"] = "\$text = 'Limites';";
$trans["admin_materials_listCheckoutlimit"] = "\$text = 'Empréstimos';";
$trans["admin_materials_listRenewallimit"] = "\$text = 'Renovações';";
$trans["admin_materials_listImageFile"] = "\$text = 'Arquivo de<br>imagem';";
$trans["admin_materials_listBibcount"] = "\$text = 'Quantidade de<br>registros bibliográficos';";
$trans["admin_materials_listEdit"] = "\$text = 'Editar';";
$trans["admin_materials_listDel"] = "\$text = 'Excluir';";
$trans["admin_materials_listNote"] = "\$text = '*Observação:';";
$trans["admin_materials_listNoteText"] = "\$text = 'A opção de exclusão está disponível apenas para tipos de materiais que não possuem registros bibliográficos associados. Para excluir um tipo de material que possui registros, primeiro altere o tipo de material desses registros para outra opção.';";

#****************************************************************************
#*  Translation text for page materials_new.php
#****************************************************************************
$trans["admin_materials_listNewadded"] = "\$text = ', adicionado.';";

#****************************************************************************
#*  Translation text for page materials_new_form.php
#****************************************************************************
$trans["admin_materials_new_formNoteText"] = "\$text = 'Os arquivos de imagem devem estar localizados no diretório openbiblio/images.';";

#****************************************************************************
#*  Translation text for page noauth.php
#****************************************************************************
$trans["admin_noauth"] = "\$text = 'Você não está autorizado a acessar a seção de Administração.';";

#****************************************************************************
#*  Translation text for page settings_edit.php
#****************************************************************************

#****************************************************************************
#*  Translation text for page settings_edit_form.php
#****************************************************************************
$trans["admin_settingsUpdated"] = "\$text = 'Configurações da biblioteca atualizadas com sucesso.';";
$trans["admin_settingsEditsettings"] = "\$text = 'Editar configurações da biblioteca:';";
$trans["admin_settingsLibName"] = "\$text = 'Nome da biblioteca:';";
$trans["admin_settingsLibimageurl"] = "\$text = 'Imagem da biblioteca (URL):';";
$trans["admin_settingsOnlyshowimginheader"] = "\$text = 'Exibir somente a imagem no cabeçalho:';";
$trans["admin_settingsLibhours"] = "\$text = 'Horário de funcionamento da biblioteca:';";
$trans["admin_settingsLibphone"] = "\$text = 'Telefone da biblioteca:';";
$trans["admin_settingsLibURL"] = "\$text = 'URL da biblioteca:';";
$trans["admin_settingsOPACURL"] = "\$text = 'URL do catálogo on-line (OPAC):';";
$trans["admin_settingsSessionTimeout"] = "\$text = 'Tempo limite da sessão:';";
$trans["admin_settingsMinutes"] = "\$text = 'minutos';";
$trans["admin_settingsSearchResults"] = "\$text = 'Resultados da pesquisa:';";
$trans["admin_settingsItemsperpage"] = "\$text = 'itens por página';";
$trans["admin_settingsPurgebibhistory"] = "\$text = 'Limpar histórico bibliográfico após:';";
$trans["days"] = "\$text = 'dias';";
$trans["Max. hold length:"] = "\$text = 'Tempo máximo de reserva:';";
$trans["admin_settingsmonths"] = "\$text = 'meses';";
$trans["admin_settingsBlockCheckouts"] = "\$text = 'Bloquear empréstimos quando houver multas pendentes:';";
$trans["admin_settingsLocale"] = "\$text = 'Idioma:';";
$trans["admin_settingsHTMLChar"] = "\$text = 'Codificação de caracteres HTML (charset):';";
$trans["admin_settingsHTMLTagLangAttr"] = "\$text = 'Atributo lang da tag HTML:';";
$trans["admin_settingsUpdated"] = "\$text = 'Configurações da biblioteca atualizadas com sucesso.';";

#****************************************************************************
#*  Translation text for all staff pages
#****************************************************************************
$trans["adminStaff_Staffmember"] = "\$text = 'Membro da equipe:';";
$trans["adminStaff_Return"] = "\$text = 'Retornar à lista de membros da equipe';";
$trans["adminStaff_Yes"] = "\$text = 'Sim';";
$trans["adminStaff_No"] = "\$text = 'Não';";

#****************************************************************************
#*  Translation text for page staff_del.php
#****************************************************************************
$trans["adminStaff_delDeleted"] = "\$text = ', excluído.';";

#****************************************************************************
#*  Translation text for page staff_delete_confirm.php
#****************************************************************************
$trans["adminStaff_del_confirmConfirmText"] = "\$text = 'Tem certeza de que deseja excluir o membro da equipe: ';";

#****************************************************************************
#*  Translation text for page staff_edit.php
#****************************************************************************
$trans["adminStaff_editUpdated"] = "\$text = ', atualizado.';";

#****************************************************************************
#*  Translation text for page staff_edit_form.php
#****************************************************************************
$trans["adminStaff_edit_formHeader"] = "\$text = 'Editar informações do membro da equipe:';";
$trans["adminStaff_edit_formLastname"] = "\$text = 'Sobrenome:';";
$trans["adminStaff_edit_formFirstname"] = "\$text = 'Nome:';";
$trans["adminStaff_edit_formLogin"] = "\$text = 'Nome de usuário:';";
$trans["adminStaff_edit_formAuth"] = "\$text = 'Permissões:';";
$trans["adminStaff_edit_formCirc"] = "\$text = 'Circulação';";
$trans["adminStaff_edit_formUpdatemember"] = "\$text = 'Atualizar usuário';";
$trans["adminStaff_edit_formCatalog"] = "\$text = 'Catalogação';";
$trans["adminStaff_edit_formAdmin"] = "\$text = 'Administração';";
$trans["adminStaff_edit_formReports"] = "\$text = 'Relatórios';";
$trans["adminStaff_edit_formSuspended"] = "\$text = 'Suspenso:';";

#****************************************************************************
#*  Translation text for page staff_list.php
#****************************************************************************
$trans["adminStaff_list_formHeader"] = "\$text = 'Adicionar novo membro da equipe';";
$trans["adminStaff_list_Columnheader"] = "\$text = 'Membro da equipe:';";
$trans["adminStaff_list_Function"] = "\$text = 'Ação';";
$trans["adminStaff_list_Edit"] = "\$text = 'Editar';";
$trans["adminStaff_list_Pwd"] = "\$text = 'Senha';";
$trans["adminStaff_list_Del"] = "\$text = 'Excluir';";

#****************************************************************************
#*  Translation text for page staff_new.php
#****************************************************************************
$trans["adminStaff_new_Added"] = "\$text = ', adicionado.';";

#****************************************************************************
#*  Translation text for page staff_new_form.php
#****************************************************************************
$trans["adminStaff_new_form_Header"] = "\$text = 'Adicionar novo membro da equipe:';";
$trans["adminStaff_new_form_Password"] = "\$text = 'Senha:';";
$trans["adminStaff_new_form_Reenterpassword"] = "\$text = 'Digite a senha novamente:';";

#****************************************************************************
#*  Translation text for page staff_pwd_reset.php
#****************************************************************************
$trans["adminStaff_pwd_reset_Passwordreset"] = "\$text = 'A senha foi redefinida.';";

#****************************************************************************
#*  Translation text for page staff_pwd_reset_form.php
#****************************************************************************
$trans["adminStaff_pwd_reset_form_Resetheader"] = "\$text = 'Redefinir senha do membro da equipe:';";

#****************************************************************************
#*  Translation text for theme pages
#****************************************************************************
$trans["adminTheme_Return"] = "\$text = 'Retornar à lista de temas';";
$trans["adminTheme_Theme"] = "\$text = 'Tema: ';";

#****************************************************************************
#*  Translation text for page theme_del.php
#****************************************************************************
$trans["adminTheme_Deleted"] = "\$text = ', excluído.';";

#****************************************************************************
#*  Translation text for page theme_del_confirm.php
#****************************************************************************
$trans["adminTheme_Deleteconfirm"] = "\$text = 'Tem certeza de que deseja excluir o tema: ';";

#****************************************************************************
#*  Translation text for page theme_edit.php
#****************************************************************************
$trans["adminTheme_Updated"] = "\$text = ', atualizado.';";

#****************************************************************************
#*  Translation text for page theme_edit_form.php
#****************************************************************************
$trans["adminTheme_Preview"] = "\$text = 'Visualizar alterações do tema';";

#****************************************************************************
#*  Translation text for page theme_list.php
#****************************************************************************
$trans["adminTheme_Changetheme"] = "\$text = 'Alterar o tema em uso:';";
$trans["adminTheme_Choosetheme"] = "\$text = 'Escolha um novo tema:';";
$trans["adminTheme_Addnew"] = "\$text = 'Adicionar novo tema';";
$trans["adminTheme_themes"] = "\$text = 'Temas:';";
$trans["adminTheme_function"] = "\$text = 'Ação';";
$trans["adminTheme_Themename"] = "\$text = 'Nome do tema';";
$trans["adminTheme_Usage"] = "\$text = 'Usar';";
$trans["adminTheme_Edit"] = "\$text = 'Editar';";
$trans["adminTheme_Copy"] = "\$text = 'Copiar';";
$trans["adminTheme_Del"] = "\$text = 'Excluir';";
$trans["adminTheme_Inuse"] = "\$text = 'Em uso';";
$trans["adminTheme_Note"] = "\$text = '*Observação:';";
$trans["adminTheme_Notetext"] = "\$text = 'A opção de exclusão não está disponível para o tema que está atualmente em uso.';";

#****************************************************************************
#*  Translation text for page theme_list.php
#****************************************************************************
$trans["adminTheme_Theme2"] = "\$text = 'Tema:';";
$trans["adminTheme_Tablebordercolor"] = "\$text = 'Cor da borda da tabela:';";
$trans["adminTheme_Errorcolor"] = "\$text = 'Cor dos erros:';";
$trans["adminTheme_Tableborderwidth"] = "\$text = 'Largura da borda da tabela:';";
$trans["adminTheme_Tablecellpadding"] = "\$text = 'Espaçamento interno das células da tabela:';";
$trans["adminTheme_Title"] = "\$text = 'Título';";
$trans["adminTheme_Mainbody"] = "\$text = 'Corpo principal';";
$trans["adminTheme_Navigation"] = "\$text = 'Navegação';";
$trans["adminTheme_Tabs"] = "\$text = 'Abas';";
$trans["adminTheme_Backgroundcolor"] = "\$text = 'Cor de fundo:';";
$trans["adminTheme_Fontface"] = "\$text = 'Fonte:';";
$trans["adminTheme_Fontsize"] = "\$text = 'Tamanho da fonte:';";
$trans["adminTheme_Bold"] = "\$text = 'Negrito';";
$trans["adminTheme_Fontcolor"] = "\$text = 'Cor da fonte:';";
$trans["adminTheme_Linkcolor"] = "\$text = 'Cor dos links:';";
$trans["adminTheme_Align"] = "\$text = 'Alinhamento:';";
$trans["adminTheme_Right"] = "\$text = 'Direita';";
$trans["adminTheme_Left"] = "\$text = 'Esquerda';";
$trans["adminTheme_Center"] = "\$text = 'Centralizado';";

$trans["adminTheme_HeaderWording"] = "\$text = 'Editar';";

#****************************************************************************
#*  Translation text for page theme_new.php
#****************************************************************************
$trans["adminTheme_new_Added"] = "\$text = ', adicionado.';";

#****************************************************************************
#*  Translation text for page theme_new_form.php
#****************************************************************************

#****************************************************************************
#*  Translation text for page theme_preview.php
#****************************************************************************
$trans["adminTheme_preview_Themepreview"] = "\$text = 'Pré-visualização do tema';";
$trans["adminTheme_preview_Librarytitle"] = "\$text = 'Título da biblioteca';";
$trans["adminTheme_preview_CloseWindow"] = "\$text = 'Fechar janela';";
$trans["adminTheme_preview_Home"] = "\$text = 'Início';";
$trans["adminTheme_preview_Circulation"] = "\$text = 'Circulação';";
$trans["adminTheme_preview_Cataloging"] = "\$text = 'Catalogação';";
$trans["adminTheme_preview_Admin"] = "\$text = 'Administração';";
$trans["adminTheme_preview_Samplelink"] = "\$text = 'Link de exemplo';";
$trans["adminTheme_preview_Thisstart"] = "\$text = 'Esta é uma pré-visualização do ';";
$trans["adminTheme_preview_Thisend"] = "\$text = 'tema.';";
$trans["adminTheme_preview_Samplelist"] = "\$text = 'Lista de exemplo:';";
$trans["adminTheme_preview_Tableheading"] = "\$text = 'Cabeçalho da tabela';";
$trans["adminTheme_preview_Sampledatarow1"] = "\$text = 'Linha de dados de exemplo 1';";
$trans["adminTheme_preview_Sampledatarow2"] = "\$text = 'Linha de dados de exemplo 2';";
$trans["adminTheme_preview_Sampledatarow3"] = "\$text = 'Linha de dados de exemplo 3';";
$trans["adminTheme_preview_Samplelink"] = "\$text = 'Link de exemplo';";
$trans["adminTheme_preview_Sampleerror"] = "\$text = 'Erro';";
$trans["adminTheme_preview_Sampleinput"] = "\$text = 'Campo de entrada de exemplo';";
$trans["adminTheme_preview_Samplebutton"] = "\$text = 'Botão de exemplo';";
$trans["adminTheme_preview_Poweredby"] = "\$text = 'Desenvolvido com OpenBiblio e traduzido por Cláudio Antonio Gomes e Henrique Monteiro';";
$trans["adminTheme_preview_Copyright"] = "\$text = 'Copyright &copy; 2002-2005 Dave Stevens';";
$trans["adminTheme_preview_underthe"] = "\$text = 'sob a';";
$trans["adminTheme_preview_GNU"] = "\$text = 'Licença Pública Geral GNU';";

#****************************************************************************
#*  Translation text for page theme_use.php
#****************************************************************************

?>