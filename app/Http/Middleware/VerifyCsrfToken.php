<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/product/list',
        '/meat/list',
        '/ingredients/list',
        '/promotions/list',
        '/drinks/list',
        '/insert/temp',
        '/delete/item',
        '/end/sale',
        '/update/client',
        '/create/client',
        '/update/ip',
        '/comanda/update',
        '/comanda/reboot',
        '/update/bread'
    ];
}
