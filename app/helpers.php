<?php

/*
|--------------------------------------------------------------------------
| Funções auxiliares
|--------------------------------------------------------------------------
*/

/* 
Converte a representação de real do JQuery MaskMoney em valor armazenável
no banco de dados.
Referente a ProdutoController.
*/
function ConverteRealDolar($real)
{
    $real = str_replace(".", "", $real);
    $dolar = str_replace(",", ".", $real);
    return $dolar;
}