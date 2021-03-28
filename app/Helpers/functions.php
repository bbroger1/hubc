<?php
function format_date($date)
{
    $date = date('d/m/Y', strtotime($date));
    return $date;
}

function format_date_db($date)
{
    $date = date('Y-m-d', strtotime($date));
    return $date;
}

function format_cpf_cnpj($doc)
{
    $doc = preg_replace("/[^0-9]/", "", $doc);
    $qtd = strlen($doc);

    if ($qtd >= 11) {

        if ($qtd === 11) {

            $docFormatado = substr($doc, 0, 3) . '.' .
                substr($doc, 3, 3) . '.' .
                substr($doc, 6, 3) . '.' .
                substr($doc, 9, 2);
        } else {
            $docFormatado = substr($doc, 0, 2) . '.' .
                substr($doc, 2, 3) . '.' .
                substr($doc, 5, 3) . '/' .
                substr($doc, 8, 4) . '-' .
                substr($doc, -2);
        }

        return $docFormatado;
    } else {
        return 'Documento invalido';
    }
}

function format_cpf_cnpj_db($doc)
{
    $doc = trim($doc);
    $doc = str_replace(array(".", ",", "-", "/"), "", $doc);
    return $doc;
}
