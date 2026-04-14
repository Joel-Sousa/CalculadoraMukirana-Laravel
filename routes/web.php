<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/', function (Request $request) {
    if (isset($request->valor1) && isset($request->valor2)) {

        $soma = ($request->valor1 / $request->valor2) * 1000;

        $somaTotal = $soma / 10;
        $somaTotal =  number_format($somaTotal, 2, ',', '.');

        $soma = number_format($soma, 2, ',', '.');
        // $frase = "$request->valor1 / $request->valor2 = $soma kg/lt <b>ou</b> R$: $sm a cada 100 g/ml";
        $frase = " R$: $soma kg/lt <b>ou</b> R$: $somaTotal | 100 g/ml";

        if (isset($request->valor3)) {

            $soma1 = $request->valor2 * $request->valor3;
            $soma1 = number_format($soma1, 0, ',', '.');

            $resp = $request->valor1 * $request->valor3;

            $frase .= "<span class='badge bg-success rounded-pill'>R$ $resp </span>";
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
