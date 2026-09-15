<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/', function (Request $request) {
    if (isset($request->valorItem) && isset($request->quantidade)) {
        $frase = '';
        $valorFloat = (float) str_replace(',', '.', $request->valorItem);

        $nomeProduto = $request->nomeProduto == null ? '' : 'Nome do produto: '.$request->nomeProduto . '<br>';

        if($request->valor4 == 'on'){

        $resp = $valorFloat / $request->quantidade;

        $frase .= "<span class='badge bg-success rounded-pill'>$nomeProduto R$ $resp </span>";
        }else{

            $litros = number_format($request->quantidade * $request->quantidadeItems, 0, '', '.');

            $soma = ($valorFloat / $request->quantidade) * 1000;

            $somaTotal = $soma / 10;
            $somaTotal =  number_format($somaTotal, 2, ',', '.');

            $soma = number_format($soma, 2, ',', '.');
            // $frase = "$request->valorItem / $request->quantidade = $soma kg/lt <b>ou</b> R$: $sm a cada 100 g/ml";
            $frase .= "$nomeProduto Valor Item: {$request->valorItem} | Litros: $litros <br> R$: $somaTotal | 100 g/ml ou R$: $soma kg/lt";

            if (isset($request->quantidadeItems)) {

                $soma1 = $request->quantidade * $request->quantidadeItems;
                $soma1 = number_format($soma1, 0, ',', '.');

                $resp = $valorFloat * $request->quantidadeItems;

                $frase .= "<span class='badge bg-success rounded-pill'>R$ $resp </span>";
            }
        }
    }

    // Adiciona o resultado na sessão chamada 'historico'
    $request->session()->push('historico', $frase);
    return redirect('/')->withInput();;
});


Route::post('/limpar', function (Request $request) {
    $request->session()->forget('historico');
    $request->session()->forget('tst');
    return redirect('/');
});
