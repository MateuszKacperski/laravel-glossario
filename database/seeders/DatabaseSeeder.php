<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\Word::factory(10)->create();
         
        $this->call(WordSeeder::class);
        $this->call(LinkSeeder::class);
        // \App\Models\Link::factory(10)->create();
         
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        $this->call(TagSeeder::class);
    }
}
