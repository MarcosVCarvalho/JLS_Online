<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

final class DashboardController extends Controller
{
    /**
     * Exibe o painel do administrador.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Admin/Dashboard');
    }
}
