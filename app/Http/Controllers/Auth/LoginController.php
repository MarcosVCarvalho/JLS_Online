<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUsuarioRequest;
use App\Services\AutenticacaoService;
use Illuminate\Http\RedirectResponse;

final class LoginController extends Controller
{
    /**
     * Autentica o usuário e o redireciona para o painel do seu perfil.
     */
    public function __invoke(LoginUsuarioRequest $request, AutenticacaoService $autenticacaoService): RedirectResponse
    {
        $usuario = $autenticacaoService->autenticar($request->validated(), $request);

        return redirect()->intended(route($usuario->role->rotaDashboard()));
    }
}
