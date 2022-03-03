<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                'descricao' => 'Telefone Celular',
                'marca' => 'Motorola',
                'modelo' => 'A20',
            ],
            [
                'descricao' => 'Ventilador',
                'marca' => 'ARNO',
                'modelo' => 'IZ12',
            ],
            [
                'descricao' => 'Notebook 15"',
                'marca' => 'Acer',
                'modelo' => 'Aspire',
            ],
            [
                'descricao' => 'Televisor 50"',
                'marca' => 'LG',
                'modelo' => 'ZX1000',
            ],
        ];
        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
