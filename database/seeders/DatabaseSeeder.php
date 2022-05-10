<?php

namespace Database\Seeders;

use App\Models\Perjalanan;
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
        // \App\Models\User::factory(10)->create();
        Perjalanan::factory(100)->create();
    }
}
