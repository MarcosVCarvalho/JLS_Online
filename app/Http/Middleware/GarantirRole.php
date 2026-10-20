<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GarantirRole
{
    /**
     * Permite o acesso apenas a usuários com um dos perfis informados.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $rolesPermitidas = array_map(Role::from(...), $roles);

        abort_unless($request->user()?->temRole(...$rolesPermitidas), Response::HTTP_FORBIDDEN);

        return $next($request);
    }
}
