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

        // \App\Models\Word::factory(10)->create();

        $this->call(WordSeeder::class);

        \App\Models\Link::factory(20)->create();

        \App\Models\User::factory()->create([
             'name' => 'Team5',
             'email' => 'team5@ciao.it',
        ]);
        
        $this->call(TagSeeder::class);

    }
}
