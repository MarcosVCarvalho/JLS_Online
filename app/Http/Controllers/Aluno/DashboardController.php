<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class DashboardController extends Controller
{
    /**
     * Exibe o painel do aluno.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Aluno/Dashboard');
    }
}
