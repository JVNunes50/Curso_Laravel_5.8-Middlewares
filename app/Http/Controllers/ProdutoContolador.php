<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoContolador extends Controller
{
    private $produtos = ['TV 40', 'Notebook', 'Impressora', 'HD Externo'];

    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }

    public function index(){
        echo"<h3>Produtos</h3>";
        echo"<ol>";
        foreach($this->produtos as $p)
            echo"<p>" . $p . "</p>";
        echo"</ol>";
    }
}
