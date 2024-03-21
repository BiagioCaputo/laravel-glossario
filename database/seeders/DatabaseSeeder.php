<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Word::factory(20)->create();

        \App\Models\User::factory()->create([
             'name' => 'Team5',
             'email' => 'team5@ciao.it',
        ]);
    }
}
