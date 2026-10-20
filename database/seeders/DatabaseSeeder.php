<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Administrador',
            'email' => 'admin@jsl.com',
        ]);

        User::factory()->professor()->create([
            'name' => 'Professor Exemplo',
            'email' => 'professor@jsl.com',
        ]);

        User::factory()->create([
            'name' => 'Aluno Exemplo',
            'email' => 'aluno@jsl.com',
        ]);
    }
}
