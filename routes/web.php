<?php

use App\Http\Middleware\PrimeiroMiddleware;
use Illuminate\Http\Request;

Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro', 'segundo');

Route::get('/terceiro', function(){
    return 'Passou pelo terceiro middlewere';
})->middleware('terceiro:joao, 20');


////////////////////////////////////////////////////////

Route::get('/produtos', 'ProdutoContolador@index');

Route::get('/negado', function(){
    return "Acesso negado!";
})->name('negado');

Route::post('/login', function(Request $request){
    $login_ok = false;
    switch ($request->input('user')) {
        case 'joao':
            $login_ok = $request->input('passwd') === "senhajoao";
            break;
        case 'marcos':
            $login_ok = $request->input('passwd') === "senhamarcos";
            break;
        default:
            $login_ok = false;
            break;
    }
    if($login_ok){
        $login = ['user'=>$request->input('user')];
        $request->session()->put('login', $login);
        return response("Login OK", 200);
    }else{
        $request->session()->flush();
        return response("Erro no login", 404);
    }
});

Route::get('/logout', function(Request $request){
    $request->session()->flush();
    return response('Deslogado com sucesso', 200);
});