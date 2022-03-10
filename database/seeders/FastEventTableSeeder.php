<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FastEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fast_events')->insert([
            [
                'title' => 'Academia',
                'start' => '19:30:00',
                'end' => '20:30:00',
                'color' => '#C40233',
            ],
            [
                'title' => 'Almoço com possiveis clientes',
                'start' => '12:30:00',
                'end' => '13:30:00',
                'color' => '#29FDF2',
            ],
        ]);
    }
}
