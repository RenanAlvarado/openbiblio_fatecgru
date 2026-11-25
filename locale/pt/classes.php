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
#*  Translation text for class Biblio
#****************************************************************************
$trans["biblioError1"]            = "\$text = 'O número de chamada é obrigatório.';";

#****************************************************************************
#*  Translation text for class BiblioField
#****************************************************************************
$trans["biblioFieldError1"]       = "\$text = 'O campo é obrigatório.';";
$trans["biblioFieldError2"]       = "\$text = 'A etiqueta deve ser numérica.';";

#****************************************************************************
#*  Translation text for class BiblioQuery
#****************************************************************************
$trans["biblioQueryQueryErr1"]    = "\$text = 'Erro ao acessar as informações bibliográficas.';";
$trans["biblioQueryQueryErr2"]    = "\$text = 'Erro ao acessar as informações dos campos bibliográficos.';";
$trans["biblioQueryInsertErr1"]   = "\$text = 'Erro ao inserir novas informações bibliográficas.';";
$trans["biblioQueryInsertErr2"]   = "\$text = 'Erro ao inserir novas informações dos campos bibliográficos.';";
$trans["biblioQueryUpdateErr1"]   = "\$text = 'Erro ao atualizar as informações bibliográficas.';";
$trans["biblioQueryUpdateErr2"]   = "\$text = 'Erro ao limpar as informações dos campos bibliográficos para atualização.';";
$trans["biblioQueryDeleteErr"]    = "\$text = 'Erro ao excluir as informações bibliográficas.';";

#****************************************************************************
#*  Translation text for class BiblioSearchQuery
#****************************************************************************
$trans["biblioSearchQueryErr1"]   = "\$text = 'Erro ao contar os resultados da pesquisa bibliográfica.';";
$trans["biblioSearchQueryErr2"]   = "\$text = 'Erro ao pesquisar informações bibliográficas.';";
$trans["biblioSearchQueryErr3"]   = "\$text = 'Erro ao ler as informações bibliográficas.';";

#****************************************************************************
#*  Translation text for class BiblioCopy
#****************************************************************************
$trans["biblioCopyError1"]        = "\$text = 'O número do código de barras é obrigatório.';";
$trans["biblioCopyError2"]        = "\$text = 'O número do código de barras contém caracteres inválidos.';";

#****************************************************************************
#*  Translation text for class BiblioCopyQuery
#****************************************************************************
$trans["biblioCopyQueryErr1"]     = "\$text = 'Erro ao verificar se o código de barras está duplicado.';";
$trans["biblioCopyQueryErr2"]     = "\$text = 'O código de barras %barcodeNmbr% já está em uso.';";
$trans["biblioCopyQueryErr3"]     = "\$text = 'Erro ao inserir as informações da nova cópia bibliográfica.';";
$trans["biblioCopyQueryErr4"]     = "\$text = 'Erro ao acessar as informações da cópia bibliográfica.';";
$trans["biblioCopyQueryErr5"]     = "\$text = 'Erro ao atualizar as informações da cópia bibliográfica.';";
$trans["biblioCopyQueryErr6"]     = "\$text = 'Erro ao excluir as informações da cópia bibliográfica.';";
$trans["biblioCopyQueryErr7"]     = "\$text = 'Erro ao acessar as informações bibliográficas para obter o código da coleção.';";
$trans["biblioCopyQueryErr8"]     = "\$text = 'Erro ao acessar as informações da coleção para verificar os dias de empréstimo.';";
$trans["biblioCopyQueryErr9"]     = "\$text = 'Ocorreu um erro ao verificar as cópias em ';";
$trans["biblioCopyQueryErr10"]    = "\$text = 'Ocorreu um erro ao verificar os limites de empréstimo.';";
$trans["biblioCopyQueryErr11"]    = "\$text = 'Erro ao buscar a maior quantidade de cópias.';";

#****************************************************************************
#*  Translation text for class BiblioFieldQuery
#****************************************************************************
$trans["biblioFieldQueryErr1"]      = "\$text = 'Erro ao ler um campo bibliográfico.';";
$trans["biblioFieldQueryErr2"]      = "\$text = 'Erro ao ler os campos bibliográficos.';";
$trans["biblioFieldQueryInsertErr"] = "\$text = 'Erro ao inserir um novo campo bibliográfico.';";
$trans["biblioFieldQueryUpdateErr"] = "\$text = 'Erro ao atualizar o campo bibliográfico.';";
$trans["biblioFieldQueryDeleteErr"] = "\$text = 'Erro ao excluir o campo bibliográfico.';";

#****************************************************************************
#*  Translation text for class UsmarcBlockDmQuery
#****************************************************************************
$trans["usmarcBlockDmQueryErr1"]  = "\$text = 'Erro ao acessar os dados do bloco MARC.';";

#****************************************************************************
#*  Translation text for class UsmarcTagDmQuery
#****************************************************************************
$trans["usmarcTagDmQueryErr1"]    = "\$text = 'Erro ao acessar os dados da etiqueta MARC.';";

#****************************************************************************
#*  Translation text for class UsmarcSubfieldDmQuery
#****************************************************************************
$trans["usmarcSubfldDmQueryErr1"] = "\$text = 'Erro ao acessar os dados do subcampo MARC.';";

#****************************************************************************
#*  Translation text for class BiblioHoldQuery
#****************************************************************************
$trans["biblioHoldQueryErr1"]     = "\$text = 'Erro ao acessar os dados de reserva pelo identificador bibliográfico.';";
$trans["biblioHoldQueryErr2"]     = "\$text = 'Erro ao acessar os dados de reserva pelo ID do membro.';";
$trans["biblioHoldQueryErr3"]     = "\$text = 'Erro ao obter o ID bibliográfico e o ID da cópia para realizar a reserva.';";
$trans["biblioHoldQueryErr4"]     = "\$text = 'Erro ao inserir os dados da reserva.';";
$trans["biblioHoldQueryErr5"]     = "\$text = 'Erro ao excluir os dados da reserva.';";
$trans["biblioHoldQueryErr6"]     = "\$text = 'Erro ao obter o primeiro membro na fila de reservas de uma cópia.';";

#****************************************************************************
#*  Translation text for class ReportQuery
#****************************************************************************
$trans["reportQueryErr1"]         = "\$text = 'Erro ao executar o relatório.';";

#****************************************************************************
#*  Translation text for class ReportCriteria
#****************************************************************************
$trans["reportCriteriaErr1"]      = "\$text = 'Um valor não numérico não é válido para uma coluna numérica.';";
$trans["reportCriteriaDateTimeErr"] = "\$text = 'Formato de data e hora inválido.';";
$trans["reportCriteriaDateErr"]   = "\$text = 'Formato de data inválido.';";

#****************************************************************************
#*  Translation text for class LabelFormat and LetterFormat
#****************************************************************************
$trans["labelFormatFontErr"]      = "\$text = 'Tipo de fonte inválido especificado na definição XML da etiqueta. Os tipos de fonte válidos são Courier, Helvetica e Times-Roman.';";
$trans["labelFormatFontSizeErr"]  = "\$text = 'Tamanho de fonte inválido especificado na definição XML da etiqueta. O tamanho da fonte deve ser numérico.';";
$trans["labelFormatFontSizeErr2"] = "\$text = 'Tamanho de fonte inválido especificado na definição XML da etiqueta. O tamanho da fonte deve ser maior que zero.';";
$trans["labelFormatLMarginErr"]   = "\$text = 'Margem esquerda inválida especificada na definição XML da etiqueta. A margem esquerda deve ser numérica.';";
$trans["labelFormatLMarginErr2"]  = "\$text = 'Margem esquerda inválida especificada na definição XML da etiqueta. A margem esquerda deve ser maior que zero.';";
$trans["labelFormatRMarginErr"]   = "\$text = 'Margem direita inválida especificada na definição XML da etiqueta. A margem direita deve ser numérica.';";
$trans["labelFormatRMarginErr2"]  = "\$text = 'Margem direita inválida especificada na definição XML da etiqueta. A margem direita deve ser maior que zero.';";
$trans["labelFormatTMarginErr"]   = "\$text = 'Margem superior inválida especificada na definição XML da etiqueta. A margem superior deve ser numérica.';";
$trans["labelFormatTMarginErr2"]  = "\$text = 'Margem superior inválida especificada na definição XML da etiqueta. A margem superior deve ser maior que zero.';";
$trans["labelFormatBMarginErr"]   = "\$text = 'Margem inferior inválida especificada na definição XML da etiqueta. A margem inferior deve ser numérica.';";
$trans["labelFormatBMarginErr2"]  = "\$text = 'Margem inferior inválida especificada na definição XML da etiqueta. A margem inferior deve ser maior que zero.';";
$trans["labelFormatColErr"]       = "\$text = 'Quantidade de colunas inválida especificada na definição XML da etiqueta. O valor deve ser numérico.';";
$trans["labelFormatColErr2"]      = "\$text = 'Quantidade de colunas inválida especificada na definição XML da etiqueta. O valor deve ser maior que zero.';";
$trans["labelFormatWidthErr"]     = "\$text = 'Largura inválida especificada na definição XML da etiqueta. A largura deve ser numérica.';";
$trans["labelFormatWidthErr2"]    = "\$text = 'Largura inválida especificada na definição XML da etiqueta. A largura deve ser maior que zero.';";
$trans["labelFormatHeightErr"]    = "\$text = 'Altura inválida especificada na definição XML da etiqueta. A altura deve ser numérica.';";
$trans["labelFormatHeightErr2"]   = "\$text = 'Altura inválida especificada na definição XML da etiqueta. A altura deve ser maior que zero.';";
$trans["labelFormatNoLabelsErr"]  = "\$text = 'Quantidade de linhas de etiquetas inválida especificada na definição XML.';";

#****************************************************************************
#*  Translation text for class BiblioStatusHistQuery
#****************************************************************************
$trans["biblioStatusHistQueryErr1"] = "\$text = 'Erro ao obter o histórico de situação da bibliografia pelo identificador bibliográfico.';";
$trans["biblioStatusHistQueryErr2"] = "\$text = 'Erro ao obter o histórico de situação da bibliografia pelo ID do membro.';";
$trans["biblioStatusHistQueryErr3"] = "\$text = 'Erro ao inserir o histórico de situação da bibliografia.';";
$trans["biblioStatusHistQueryErr4"] = "\$text = 'Erro ao excluir o histórico de situação da bibliografia pelo ID da cópia.';";
$trans["biblioStatusHistQueryErr5"] = "\$text = 'Erro ao excluir o histórico de situação da bibliografia pelo ID do membro.';";

#****************************************************************************
#*  Translation text for class MemberAccountTransaction
#****************************************************************************
$trans["memberAccountTransError1"] = "\$text = 'O valor é obrigatório.';";
$trans["memberAccountTransError2"] = "\$text = 'O valor deve ser numérico.';";
$trans["memberAccountTransError3"] = "\$text = 'A descrição é obrigatória.';";

#****************************************************************************
#*  Translation text for class MemberAccountQuery
#****************************************************************************
$trans["memberAccountQueryErr1"]   = "\$text = 'Erro ao acessar as informações da conta do membro.';";
$trans["memberAccountQueryErr2"]   = "\$text = 'Erro ao inserir informações na conta do membro.';";
$trans["memberAccountQueryErr3"]   = "\$text = 'Erro ao excluir informações da conta do membro.';";

?>