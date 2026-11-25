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
$trans["circCancel"]              = "\$text = 'Cancelar';";
$trans["circDelete"]              = "\$text = 'Excluir';";
$trans["circLogout"]              = "\$text = 'Sair do sistema';";
$trans["Logout"]                  = "\$text = 'Sair do sistema';";
$trans["circAdd"]                 = "\$text = 'Adicionar';";
$trans["mbrDupBarcode"]           = "\$text = 'Este número de código de barras, %barcode%, já está em uso.';";

#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHeading"]            = "\$text='Circulação';";
$trans["indexCardHdr"]            = "\$text='Pesquisar membro pelo número do cartão:';";
$trans["indexCard"]               = "\$text='Número do cartão:';";
$trans["indexSearch"]             = "\$text='Pesquisar';";
$trans["indexNameHdr"]            = "\$text='Pesquisar membro pelo sobrenome:';";
$trans["indexName"]               = "\$text='Sobrenome começa com:';";

#****************************************************************************
#*  Translation text for page mbr_new_form.php, mbr_edit_form.php and mbr_fields.php
#****************************************************************************
$trans["Mailing Address:"]        = "\$text='Endereço para correspondência:';";
$trans["mbrNewForm"]              = "\$text='Adicionar novo';";
$trans["mbrEditForm"]             = "\$text='Editar';";
$trans["mbrFldsHeader"]           = "\$text='Usuário:';";
$trans["mbrFldsCardNmbr"]         = "\$text='Número do cartão:';";
$trans["mbrFldsLastName"]         = "\$text='Sobrenome:';";
$trans["mbrFldsFirstName"]        = "\$text='Nome:';";
$trans["mbrFldsAddr1"]            = "\$text='Endereço residencial 1:';";
$trans["mbrFldsAddr2"]            = "\$text='Endereço residencial 2:';";
$trans["mbrFldsCity"]             = "\$text='Cidade:';";
$trans["mbrFldsStateZip"]         = "\$text='Estado, CEP:';";
$trans["mbrFldsHomePhone"]        = "\$text='Telefone residencial:';";
$trans["mbrFldsWorkPhone"]        = "\$text='Telefone comercial:';";
$trans["mbrFldsEmail"]            = "\$text='E-mail:';";
$trans["mbrFldsClassify"]         = "\$text='Classificação:';";
$trans["mbrFldsGrade"]            = "\$text='Série escolar:';";
$trans["mbrFldsTeacher"]          = "\$text='Professor:';";
$trans["mbrFldsSubmit"]           = "\$text='Enviar';";
$trans["mbrFldsCancel"]           = "\$text='Cancelar';";
$trans["mbrsearchResult"]         = "\$text='Resultado da pesquisa: ';";
$trans["mbrsearchprev"]           = "\$text='Anterior';";
$trans["mbrsearchnext"]           = "\$text='Próximo';";
$trans["mbrsearchNoResults"]      = "\$text='Nenhum resultado encontrado.';";
$trans["mbrsearchFoundResults"]   = "\$text=' Resultados encontrados.';";
$trans["mbrsearchSearchResults"]  = "\$text='Resultados da pesquisa:';";
$trans["mbrsearchCardNumber"]     = "\$text='Número do cartão:';";
$trans["mbrsearchClassification"] = "\$text='Classificação:';";

#****************************************************************************
#*  Translation text for page mbr_new.php
#****************************************************************************
$trans["mbrNewSuccess"]           = "\$text='Usuário adicionado com sucesso.';";

#****************************************************************************
#*  Translation text for page mbr_edit.php
#****************************************************************************
$trans["mbrEditSuccess"]          = "\$text='Usuário atualizado com sucesso.';";

#****************************************************************************
#*  Translation text for page mbr_view.php
#****************************************************************************
$trans["mbrViewHead1"]            = "\$text='Informações do membro:';";
$trans["mbrViewName"]             = "\$text='Nome:';";
$trans["mbrViewAddr"]             = "\$text='Endereço:';";
$trans["mbrViewCardNmbr"]         = "\$text='Número do cartão:';";
$trans["mbrViewClassify"]         = "\$text='Classificação:';";
$trans["mbrViewPhone"]            = "\$text='Telefone:';";
$trans["mbrViewPhoneHome"]        = "\$text='Residencial:';";
$trans["mbrViewPhoneWork"]        = "\$text='Comercial:';";
$trans["mbrViewEmail"]            = "\$text='E-mail:';";
$trans["mbrViewGrade"]            = "\$text='Série escolar:';";
$trans["mbrViewTeacher"]          = "\$text='Professor:';";
$trans["mbrViewHead2"]            = "\$text='Estatísticas de empréstimos:';";
$trans["mbrViewStatColHdr1"]      = "\$text='Material';";
$trans["mbrViewStatColHdr2"]      = "\$text='Quantidade';";
$trans["mbrViewStatColHdr3"]      = "\$text='Limites';";
$trans["mbrViewStatColHdr4"]      = "\$text='Empréstimos';";
$trans["mbrViewStatColHdr5"]      = "\$text='Renovações';";
$trans["mbrViewHead3"]            = "\$text='Materiais emprestados:';";
$trans["mbrViewBarcode"]          = "\$text='Número do código de barras:';";
$trans["mbrViewCheckOut"]         = "\$text='Quantidade';";
$trans["mbrViewHead4"]            = "\$text='Materiais atualmente emprestados:';";
$trans["mbrViewOutHdr1"]          = "\$text='Data do empréstimo';";
$trans["mbrViewOutHdr2"]          = "\$text='Material';";
$trans["mbrViewOutHdr3"]          = "\$text='Código de barras';";
$trans["mbrViewOutHdr4"]          = "\$text='Título';";
$trans["mbrViewOutHdr5"]          = "\$text='Autor';";
$trans["mbrViewOutHdr6"]          = "\$text='Data de devolução';";
$trans["mbrViewOutHdr7"]          = "\$text='Dias em atraso';";
$trans["mbrViewOutHdr8"]          = "\$text='Renovações';";
$trans["mbrViewOutHdr9"]          = "\$text='Dia(s)';";
$trans["mbrViewNoCheckouts"]      = "\$text='Nenhum material está emprestado no momento.';";
$trans["mbrViewHead5"]            = "\$text='Adicionar:';";
$trans["mbrViewHead6"]            = "\$text='Materiais reservados:';";
$trans["mbrViewPlaceHold"]        = "\$text='Adicionar reserva';";
$trans["mbrViewHoldHdr1"]         = "\$text='Ação';";
$trans["mbrViewHoldHdr2"]         = "\$text='Data da reserva';";
$trans["mbrViewHoldHdr3"]         = "\$text='Material';";
$trans["mbrViewHoldHdr4"]         = "\$text='Código de barras';";
$trans["mbrViewHoldHdr5"]         = "\$text='Título';";
$trans["mbrViewHoldHdr6"]         = "\$text='Autor';";
$trans["mbrViewHoldHdr7"]         = "\$text='Status';";
$trans["mbrViewHoldHdr8"]         = "\$text='Data de devolução';";
$trans["mbrViewNoHolds"]          = "\$text='Nenhum material está reservado no momento.';";
$trans["mbrViewBalMsg"]           = "\$text='Observação: saldo do usuário: %bal%.';";
$trans["mbrPrintCheckouts"]       = "\$text='Imprimir comprovante';";
$trans["mbrViewDel"]              = "\$text='Excluir';";

#****************************************************************************
#*  Translation text for page checkout.php
#****************************************************************************
$trans["checkoutBalErr"]          = "\$text='O usuário deve quitar o saldo pendente da conta antes de realizar a devolução.';";
$trans["checkoutErr1"]            = "\$text='O número do código de barras deve conter apenas caracteres alfanuméricos.';";
$trans["checkoutErr2"]            = "\$text='Nenhum material foi encontrado com esse número de código de barras.';";
$trans["checkoutErr3"]            = "\$text='O material com o número de código de barras %barcode% já foi emprestado.';";
$trans["checkoutErr4"]            = "\$text='O material com o código %barcode% não está disponível.';";
$trans["checkoutErr5"]            = "\$text='O material com o número de código de barras %barcode% está reservado para outro usuário.';";
$trans["checkoutErr6"]            = "\$text='O usuário atingiu o limite de empréstimos para esse tipo de material.';";
$trans["checkoutErr7"]            = "\$text='O material com o número de código de barras %barcode% atingiu o limite de renovações.';";
$trans["checkoutErr8"]            = "\$text='O material com o número de código de barras %barcode% não pode ser renovado.';";

#****************************************************************************
#*  Translation text for page shelving_cart.php
#****************************************************************************
$trans["shelvingCartErr1"]        = "\$text='O número do código de barras deve conter apenas caracteres alfanuméricos.';";
$trans["shelvingCartErr2"]        = "\$text='Nenhum material foi encontrado com esse número de código de barras.';";
$trans["shelvingCartTrans"]       = "\$text='Taxa de atraso (código de barras=%barcode%)';";

#****************************************************************************
#*  Translation text for page checkin_form.php
#****************************************************************************
$trans["checkinFormHdr1"]         = "\$text='Material:';";
$trans["checkinFormBarcode"]      = "\$text='Número do código de barras:';";
$trans["checkinFormShelveButton"] = "\$text='Adicionar ao carrinho de devolução';";
$trans["checkinFormCheckinLink1"] = "\$text='Devolver itens selecionados';";
$trans["checkinFormCheckinLink2"] = "\$text='Devolver todos os itens';";
$trans["checkinFormHdr2"]         = "\$text='Lista atual do carrinho de devolução:';";
$trans["checkinFormColHdr1"]      = "\$text='Data de inclusão';";
$trans["checkinFormColHdr2"]      = "\$text='Código de barras';";
$trans["checkinFormColHdr3"]      = "\$text='Título';";
$trans["checkinFormColHdr4"]      = "\$text='Autor';";
$trans["checkinFormEmptyCart"]    = "\$text='Nenhum material está atualmente no carrinho de devolução.';";

#****************************************************************************
#*  Translation text for page checkin.php
#****************************************************************************
$trans["checkinErr1"]             = "\$text='Nenhum item foi selecionado.';";

#****************************************************************************
#*  Translation text for page hold_message.php
#****************************************************************************
$trans["holdMessageHdr"]          = "\$text='Material reservado!';";
$trans["holdMessageMsg1"]         = "\$text='O material com o número de código de barras %barcode% que você está tentando devolver possui uma ou mais reservas. <b>Por favor, encaminhe esse material para o local de retirada de reservas em vez de colocá-lo no carrinho de devolução.</b> O status do material foi atualizado para.';";
$trans["holdMessageMsg2"]         = "\$text='Voltar à devolução do material.';";

#****************************************************************************
#*  Translation text for page place_hold.php
#****************************************************************************
$trans["placeHoldErr1"]           = "\$text='O código de barras deve ser numérico.';";
$trans["placeHoldErr2"]           = "\$text='O código de barras não existe.';";
$trans["placeHoldErr3"]           = "\$text='Este usuário já possui esse material emprestado. Não é possível fazer uma reserva.';";

#****************************************************************************
#*  Translation text for page mbr_del_confirm.php
#****************************************************************************
$trans["mbrDelConfirmWarn"]       = "\$text = 'O usuário %name% possui %checkoutCount% empréstimo(s) e %holdCount% reserva(s). Todos os materiais devem ser devolvidos e todas as reservas canceladas antes de excluir este usuário.';";
$trans["mbrDelConfirmReturn"]     = "\$text = 'Retornar às informações do usuário';";
$trans["mbrDelConfirmMsg"]        = "\$text = 'Tem certeza de que deseja excluir o usuário %name%? Isso também excluirá todo o histórico de transações desse usuário.';";

#****************************************************************************
#*  Translation text for page mbr_del.php
#****************************************************************************
$trans["mbrDelSuccess"]           = "\$text='O usuário %name% foi excluído.';";
$trans["mbrDelReturn"]            = "\$text='Retornar à pesquisa de usuários';";

#****************************************************************************
#*  Translation text for page mbr_history.php
#****************************************************************************
$trans["mbrHistoryHead1"]         = "\$text='Histórico de empréstimos do usuário:';";
$trans["mbrHistoryNoHist"]        = "\$text='Nenhum histórico foi encontrado.';";
$trans["mbrHistoryHdr1"]          = "\$text='Código de barras';";
$trans["mbrHistoryHdr2"]          = "\$text='Título';";
$trans["mbrHistoryHdr3"]          = "\$text='Autor';";
$trans["mbrHistoryHdr4"]          = "\$text='Novo status';";
$trans["mbrHistoryHdr5"]          = "\$text='Data da alteração de status';";
$trans["mbrHistoryHdr6"]          = "\$text='Data de devolução';";

#****************************************************************************
#*  Translation text for page mbr_account.php
#****************************************************************************
$trans["mbrAccountLabel"]         = "\$text='Adicionar uma transação:';";
$trans["mbrAccountTransTyp"]      = "\$text='Tipo de transação:';";
$trans["mbrAccountAmount"]        = "\$text='Valor total:';";
$trans["mbrAccountDesc"]          = "\$text='Descrição:';";
$trans["mbrAccountHead1"]         = "\$text='Transações da conta do usuário:';";
$trans["mbrAccountNoTrans"]       = "\$text='Nenhuma transação encontrada.';";
$trans["mbrAccountOpenBal"]       = "\$text='Saldo inicial';";
$trans["mbrAccountDel"]           = "\$text='Excluir';";
$trans["mbrAccountHdr1"]          = "\$text='Ação';";
$trans["mbrAccountHdr2"]          = "\$text='Data';";
$trans["mbrAccountHdr3"]          = "\$text='Tipo de transação';";
$trans["mbrAccountHdr4"]          = "\$text='Descrição';";
$trans["mbrAccountHdr5"]          = "\$text='Valor';";
$trans["mbrAccountHdr6"]          = "\$text='Saldo';";

#****************************************************************************
#*  Translation text for page mbr_transaction.php
#****************************************************************************
$trans["mbrTransactionSuccess"]   = "\$text='Transação realizada com sucesso.';";

#****************************************************************************
#*  Translation text for page mbr_transaction_del_confirm.php
#****************************************************************************
$trans["mbrTransDelConfirmMsg"]   = "\$text='Tem certeza de que deseja excluir esta transação?';";

#****************************************************************************
#*  Translation text for page mbr_transaction_del.php
#****************************************************************************
$trans["mbrTransactionDelSuccess"] = "\$text='Transação excluída com sucesso.';";

#****************************************************************************
#*  Translation text for page mbr_print_checkouts.php
#****************************************************************************
$trans["mbrPrintCheckoutsTitle"]  = "\$text='Empréstimos de %mbrName%';";
$trans["mbrPrintCheckoutsHdr1"]   = "\$text='Data atual:';";
$trans["mbrPrintCheckoutsHdr2"]   = "\$text='Usuário:';";
$trans["mbrPrintCheckoutsHdr3"]   = "\$text='Número do cartão:';";
$trans["mbrPrintCheckoutsHdr4"]   = "\$text='Classificação:';";
$trans["mbrPrintCloseWindow"]     = "\$text='Fechar janela';";

#****************************************************************************
#*  Translation text for page offline.php
#****************************************************************************
$trans["Upload Offline Circulation"] = "\$text='Enviar dados de circulação offline';";
$trans["Date:"]                   = "\$text='Data:';";
$trans["Command File:"]           = "\$text='Arquivo de comandos:';";
$trans["Upload"]                  = "\$text='Enviar arquivo';";
$trans["Command Sheet"]           = "\$text='Planilha de comandos';";
?>