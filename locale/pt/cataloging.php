<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

/**********************************************************************************
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *   Allowing translators to execute php code within the transFunc string
 *   provides the maximum amount of flexibility to format the language syntax.
 *
 *   Formatting rules:
 *   - Resulting translation string must be stored in a variable called $text.
 *   - Input arguments must be surrounded by % characters (i.e. %pageCount%).
 *   - A backslash ('\') needs to be placed before any special php characters
 *     (such as $, ", etc.) within the php translation code.
 *
 **********************************************************************************/

#****************************************************************************
#* Common translation text shared among multiple pages
#****************************************************************************
$trans["catalogSubmit"]            = "\$text = 'Enviar';";
$trans["catalogCancel"]            = "\$text = 'Cancelar';";
$trans["catalogRefresh"]           = "\$text = 'Atualizar';";
$trans["catalogDelete"]            = "\$text = 'Excluir';";
$trans["catalogFootnote"]          = "\$text = 'Os campos marcados com %symbol% são obrigatórios.';";
$trans["AnswerYes"]                = "\$text = 'Sim';";
$trans["AnswerNo"]                 = "\$text = 'Não';";

#****************************************************************************
#* Translation text for page index.php
#****************************************************************************
$trans["indexHdr"]                 = "\$text = 'Catalogação';";
$trans["indexBarcodeHdr"]          = "\$text = 'Pesquisar material pelo código de barras';";
$trans["indexBarcodeField"]        = "\$text = 'Número do código de barras';";
$trans["indexSearchHdr"]           = "\$text = 'Pesquisar material por palavra ou frase';";
$trans["indexKeyword"]             = "\$text = 'Palavra-chave';";
$trans["indexTitle"]               = "\$text = 'Título';";
$trans["indexAuthor"]              = "\$text = 'Autor';";
$trans["indexSubject"]             = "\$text = 'Assunto';";
$trans["indexButton"]              = "\$text = 'Pesquisar';";

#****************************************************************************
#* Translation text for page biblio_fields.php
#****************************************************************************
$trans["biblioFieldsLabel"]        = "\$text = 'Dados bibliográficos';";
$trans["biblioFieldsMaterialTyp"]  = "\$text = 'Tipo de material';";
$trans["biblioFieldsCollection"]   = "\$text = 'Coleção';";
$trans["biblioFieldsCallNmbr"]     = "\$text = 'Número de chamada';";
$trans["biblioFieldsUsmarcFields"] = "\$text = 'Campos USMARC';";
$trans["biblioFieldsOpacFlg"]      = "\$text = 'Exibir no catálogo público (OPAC)';";

#****************************************************************************
#* Translation text for page biblio_new.php
#****************************************************************************
$trans["biblioNewFormLabel"]       = "\$text = 'Adicionar novo';";
$trans["biblioNewSuccess"]         = "\$text = 'O novo registro bibliográfico foi criado. Para adicionar um exemplar, selecione \"Novo exemplar\" na navegação à esquerda ou \"Adicionar novo exemplar\" nas informações do exemplar abaixo.';";

#****************************************************************************
#* Translation text for page biblio_edit.php
#****************************************************************************
$trans["biblioEditSuccess"]        = "\$text = 'Registro bibliográfico atualizado com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_copy_new_form.php and biblio_copy_edit_form.php
#****************************************************************************
$trans["biblioCopyNewFormLabel"]   = "\$text = 'Adicionar novo exemplar';";
$trans["biblioCopyNewBarcode"]     = "\$text = 'Número do código de barras';";
$trans["biblioCopyNewDesc"]        = "\$text = 'Descrição';";
$trans["biblioCopyNewAuto"]        = "\$text = 'Gerar automaticamente';";
$trans["biblioCopyNewValidBarco"]  = "\$text = 'Validar para impressão';";
$trans["biblioCopyEditFormLabel"]  = "\$text = 'Editar exemplar';";
$trans["biblioCopyEditFormStatus"] = "\$text = 'Status';";

#****************************************************************************
#* Translation text for page biblio_copy_new.php
#****************************************************************************
$trans["biblioCopyNewSuccess"]     = "\$text = 'Exemplar criado com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_copy_edit.php
#****************************************************************************
$trans["biblioCopyEditSuccess"]    = "\$text = 'Exemplar atualizado com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_copy_del_confirm.php
#****************************************************************************
$trans["biblioCopyDelConfirmErr1"] = "\$text = 'Não foi possível excluir o exemplar. Ele precisa ser devolvido antes de ser excluído.';";
$trans["biblioCopyDelConfirmMsg"]  = "\$text = 'Tem certeza de que deseja excluir o exemplar com código de barras %barcodeNmbr%? Isso também excluirá todo o histórico de alterações de status desse exemplar.';";

#****************************************************************************
#* Translation text for page biblio_copy_del.php
#****************************************************************************
$trans["biblioCopyDelSuccess"]     = "\$text = 'O exemplar com código de barras %barcode% foi excluído com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_marc_list.php
#****************************************************************************
$trans["biblioMarcListMarcSelect"] = "\$text = 'Adicionar novo campo MARC';";
$trans["biblioMarcListHdr"]        = "\$text = 'Informações dos campos MARC';";
$trans["biblioMarcListTbleCol1"]   = "\$text = 'Ação';";
$trans["biblioMarcListTbleCol2"]   = "\$text = 'Tag';";
$trans["biblioMarcListTbleCol3"]   = "\$text = 'Descrição da tag';";
$trans["biblioMarcListTbleCol4"]   = "\$text = 'Indicador 1';";
$trans["biblioMarcListTbleCol5"]   = "\$text = 'Indicador 2';";
$trans["biblioMarcListTbleCol6"]   = "\$text = 'Subcampo';";
$trans["biblioMarcListTbleCol7"]   = "\$text = 'Descrição do subcampo';";
$trans["biblioMarcListTbleCol8"]   = "\$text = 'Dados do campo';";
$trans["biblioMarcListNoRows"]     = "\$text = 'Nenhum campo MARC encontrado.';";
$trans["biblioMarcListEdit"]       = "\$text = 'Editar';";
$trans["biblioMarcListDel"]        = "\$text = 'Excluir';";

#****************************************************************************
#* Translation text for page usmarc_select.php
#****************************************************************************
$trans["usmarcSelectHdr"]          = "\$text = 'Seletor de campos MARC';";
$trans["usmarcSelectInst"]         = "\$text = 'Selecione um tipo de campo';";
$trans["usmarcSelectNoTags"]       = "\$text = 'Nenhuma tag encontrada.';";
$trans["usmarcSelectUse"]          = "\$text = 'Usar';";
$trans["usmarcCloseWindow"]        = "\$text = 'Fechar janela';";

#****************************************************************************
#* Translation text for page biblio_marc_new_form.php
#****************************************************************************
$trans["biblioMarcNewFormHdr"]     = "\$text = 'Adicionar novo campo MARC';";
$trans["biblioMarcNewFormTag"]     = "\$text = 'Tag';";
$trans["biblioMarcNewFormSubfld"]  = "\$text = 'Subcampo';";
$trans["biblioMarcNewFormData"]    = "\$text = 'Dados do campo';";
$trans["biblioMarcNewFormInd1"]    = "\$text = 'Indicador 1';";
$trans["biblioMarcNewFormInd2"]    = "\$text = 'Indicador 2';";
$trans["biblioMarcNewFormSelect"]  = "\$text = 'Selecionar';";

#****************************************************************************
#* Translation text for page biblio_marc_new.php
#****************************************************************************
$trans["biblioMarcNewSuccess"]     = "\$text = 'Campo MARC adicionado com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_marc_edit_form.php
#****************************************************************************
$trans["biblioMarcEditFormHdr"]    = "\$text = 'Editar campo MARC';";

#****************************************************************************
#* Translation text for page biblio_marc_edit.php
#****************************************************************************
$trans["biblioMarcEditSuccess"]    = "\$text = 'Campo MARC atualizado com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_marc_del_confirm.php
#****************************************************************************
$trans["biblioMarcDelConfirmMsg"]  = "\$text = 'Tem certeza de que deseja excluir o campo com a tag %tag% e o subcampo %subfieldCd%?';";

#****************************************************************************
#* Translation text for page biblio_marc_del.php
#****************************************************************************
$trans["biblioMarcDelSuccess"]     = "\$text = 'Campo MARC excluído com sucesso.';";

#****************************************************************************
#* Translation text for page biblio_del_confirm.php
#****************************************************************************
$trans["biblioDelConfirmWarn"]     = "\$text = 'Este registro bibliográfico possui %copyCount% exemplar(es) e %holdCount% reserva(s). Exclua esses exemplares e/ou cancele as reservas antes de excluir o registro.';";
$trans["biblioDelConfirmReturn"]   = "\$text = 'Retornar às informações bibliográficas';";
$trans["biblioDelConfirmMsg"]      = "\$text = 'Tem certeza de que deseja excluir o registro bibliográfico com o título %title%?';";

#****************************************************************************
#* Translation text for page biblio_del.php
#****************************************************************************
$trans["biblioDelMsg"]             = "\$text = 'O registro bibliográfico %title% foi excluído.';";
$trans["biblioDelReturn"]          = "\$text = 'Retornar à pesquisa bibliográfica';";

#****************************************************************************
#* Translation text for page biblio_hold_list.php
#****************************************************************************
$trans["biblioHoldListHead"]       = "\$text = 'Reservas de materiais:';";
$trans["biblioHoldListNoHolds"]    = "\$text = 'Nenhum exemplar está reservado no momento.';";
$trans["biblioHoldListHdr1"]       = "\$text = 'Ação';";
$trans["biblioHoldListHdr2"]       = "\$text = 'Exemplar';";
$trans["biblioHoldListHdr3"]       = "\$text = 'Data da reserva';";
$trans["biblioHoldListHdr4"]       = "\$text = 'Usuário';";
$trans["biblioHoldListHdr5"]       = "\$text = 'Status';";
$trans["biblioHoldListHdr6"]       = "\$text = 'Data prevista';";
$trans["biblioHoldListdel"]        = "\$text = 'Excluir';";

#****************************************************************************
#* Translation text for page noauth.php
#****************************************************************************
$trans["NotAuth"]                  = "\$text = 'Você não está autorizado a acessar a seção de Catalogação.';";

#****************************************************************************
#* Translation text for page upload_usmarc.php and upload_usmarc_form.php
#****************************************************************************
$trans["MarcUploadTest"]           = "\$text = 'Teste de importação';";
$trans["MarcUploadTestTrue"]       = "\$text = 'Sim';";
$trans["MarcUploadTestFalse"]      = "\$text = 'Não';";
$trans["MarcUploadTestFileUpload"] = "\$text = 'Arquivo USMARC';";
$trans["MarcUploadRecordsUploaded"] = "\$text = 'Registros importados';";
$trans["MarcUploadMarcRecord"]     = "\$text = 'Registro MARC';";
$trans["MarcUploadTag"]            = "\$text = 'Tag';";
$trans["MarcUploadSubfield"]       = "\$text = 'Subcampo';";
$trans["MarcUploadData"]           = "\$text = 'Dados';";
$trans["MarcUploadRawData"]        = "\$text = 'Dados brutos:';";
$trans["UploadFile"]               = "\$text = 'Enviar arquivo';";

#****************************************************************************
#* Translation text for footer
#****************************************************************************
$trans["PoweredByOB"]              = "\$text = 'Desenvolvido com OpenBiblio. Tradução por Cláudio A. Gomes e Henrique Monteiro.';";
$trans["Copyright"]                = "\$text = 'Copyright &copy; 2002-2005';";
$trans["underthe"]                 = "\$text = 'sob a';";
$trans["GNU"]                      = "\$text = 'Licença Pública Geral GNU (GPL)';";

$trans["catalogResults"]           = "\$text = 'Resultados da pesquisa';";

?>


