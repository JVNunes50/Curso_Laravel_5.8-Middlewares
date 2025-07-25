<?php

use App\Http\Middleware\PrimeiroMiddleware;
use Illuminate\Http\Request;

Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro', 'segundo');

Route::get('/terceiro', function(){
    return 'Passou pelo terceiro middlewere';
})->middleware('terceiro:joao, 20');


////////////////////////////////////////////////////////

Route::get('/produtos', 'ProdutoContolador@index');

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
        return response("Login OK", 200);
    }else{
        return response("Erro no login", 404);
    }
});