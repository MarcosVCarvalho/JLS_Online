<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class RedirecionarDashboardController extends Controller
{
    /**
     * Redireciona o usuário autenticado para o painel do seu perfil.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        return redirect()->route($request->user()->role->rotaDashboard());
    }
}
