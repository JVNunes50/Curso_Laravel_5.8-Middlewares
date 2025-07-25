<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoContolador extends Controller
{
    private $produtos = ['TV 40', 'Notebook', 'Impressora', 'HD Externo'];
    public function index(){
        echo"<h3>Produtos</h3>";
        echo"<ol>";
        foreach($this->produtos as $p)
            echo"<p>" . $p . "</p>";
        echo"</ol>";
    }
}
