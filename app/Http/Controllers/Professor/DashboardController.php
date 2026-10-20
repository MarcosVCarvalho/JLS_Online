<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class DashboardController extends Controller
{
    /**
     * Exibe o painel do professor.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Professor/Dashboard');
    }
}
