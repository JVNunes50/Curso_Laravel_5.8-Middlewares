<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use PhpParser\Node\Stmt\Return_;

class PrimeiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('Passou pelo PrimeiroMeddleware ANTES'); 
        //return response('Parando a cadeia de chamadas');
        $response = $next($request);
        Log::debug('Passou pelo PrimeiroMeddleware DEPOIS'); 
        //Return $response;
        Return $response->setContent('Alterei a resposta');
    }
}
