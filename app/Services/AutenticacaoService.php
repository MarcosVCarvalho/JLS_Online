<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AutenticacaoService
{
    private const int MAXIMO_TENTATIVAS = 5;

    /**
     * Autentica o usuário ativo com as credenciais informadas e inicia a sessão.
     *
     * @param  array{email: string, senha: string, lembrar?: bool}  $dados
     *
     * @throws ValidationException
     */
    public function autenticar(array $dados, Request $request): User
    {
        $chaveLimite = $this->chaveLimite($dados['email'], $request);

        $this->garantirQueNaoEstaBloqueado($chaveLimite, $request);

        $credenciais = [
            'email' => $dados['email'],
            'password' => $dados['senha'],
            'esta_ativo' => true,
        ];

        if (! Auth::attempt($credenciais, $dados['lembrar'] ?? false)) {
            RateLimiter::hit($chaveLimite);

            throw ValidationException::withMessages([
                'email' => 'E-mail ou senha inválidos.',
            ]);
        }

        RateLimiter::clear($chaveLimite);

        $request->session()->regenerate();

        return Auth::user();
    }

    /**
     * Encerra a sessão do usuário autenticado.
     */
    public function encerrarSessao(Request $request): void
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    /**
     * @throws ValidationException
     */
    private function garantirQueNaoEstaBloqueado(string $chaveLimite, Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($chaveLimite, self::MAXIMO_TENTATIVAS)) {
            return;
        }

        event(new Lockout($request));

        $segundos = RateLimiter::availableIn($chaveLimite);

        throw ValidationException::withMessages([
            'email' => "Muitas tentativas de acesso. Tente novamente em {$segundos} segundos.",
        ]);
    }

    private function chaveLimite(string $email, Request $request): string
    {
        return Str::transliterate(Str::lower($email).'|'.$request->ip());
    }
}
