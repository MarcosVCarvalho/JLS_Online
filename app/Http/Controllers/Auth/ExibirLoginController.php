<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class ExibirLoginController extends Controller
{
    /**
     * Exibe a tela de login.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Auth/Login');
    }
}
