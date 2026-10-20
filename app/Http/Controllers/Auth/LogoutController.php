<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AutenticacaoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class LogoutController extends Controller
{
    /**
     * Encerra a sessão do usuário.
     */
    public function __invoke(Request $request, AutenticacaoService $autenticacaoService): RedirectResponse
    {
        $autenticacaoService->encerrarSessao($request);

        return redirect()->route('login');
    }
}
