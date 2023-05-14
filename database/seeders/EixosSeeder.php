<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EixosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eixos')->insert([
        'nome' => "Ciencias sociais" ]);
        DB::table('eixos')->insert([
        'nome' => "Fisica" ]);
    }
}
