<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            ['name' => 'W3 School', 'url' => 'https://www.w3schools.com/'],
            ['name' => 'MDN Web docs', 'url' => 'https://developer.mozilla.org/en-US/'],
        ];

        foreach($links as $link){
            $new_link = new Link();
            
        }
    }
}
