<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\C001_Pessoa::factory(50)->create();
        \App\Models\C002_Produto::factory(100)->create();
    }
}
