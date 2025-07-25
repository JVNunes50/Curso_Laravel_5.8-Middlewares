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
    return "Acesso negado! Voce nao possui acessso a esta pagina";
})->name('negado');

Route::get('/negadologin', function(){
    return "Acesso negado! Voce precisa ser administrador para acessar este conteudo";
})->name('negadologin');

Route::post('/login', function(Request $request){
    $login_ok = false;
    $admin = false;
    switch ($request->input('user')) {
        case 'joao':
            $login_ok = $request->input('passwd') === "senhajoao";
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $request->input('passwd') === "senhamarcos";
            break;
        default:
            $login_ok = false;
            break;
    }
    if($login_ok){
        $login = ['user'=>$request->input('user'), 'admin'=>$admin];
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