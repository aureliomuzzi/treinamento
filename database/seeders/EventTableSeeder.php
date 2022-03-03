<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'title' => 'Reunião',
                'start' => '2022-03-25 19:30:00',
                'end' => '2022-03-26 19:30:00',
                'color' => '#C40233',
                'description' => 'Reunião com Clientes da IIN Tecnologia'
            ],
            [
                'title' => 'Ligar para Cliente',
                'start' => '2022-03-27',
                'end' => '2022-03-27',
                'color' => '#29FDF2',
                'description' => 'Fala com cliente sobre o sistema NeoPiing'
            ],
        ]);
    }
}
