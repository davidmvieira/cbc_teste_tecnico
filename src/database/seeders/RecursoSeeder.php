<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recurso;

class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recurso::insert([
            [
                'recurso' => 'Recurso para passagens',
                'saldo_disponivel' => 10000.00,
            ],
            [
                'recurso' => 'Recurso para hospedagem',
                'saldo_disponivel' => 10000.00,
            ],
        ]);
        
    }
}
