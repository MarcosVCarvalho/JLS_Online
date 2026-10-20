<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Professor = 'professor';
    case Aluno = 'aluno';

    /**
     * Nome amigável exibido na interface.
     */
    public function rotulo(): string
    {
        return match ($this) {
            self::Admin => 'Administrador',
            self::Professor => 'Professor',
            self::Aluno => 'Aluno',
        };
    }

    /**
     * Nome da rota do painel inicial deste perfil.
     */
    public function rotaDashboard(): string
    {
        return "{$this->value}.dashboard";
    }
}
