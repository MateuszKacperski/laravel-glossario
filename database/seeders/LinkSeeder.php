<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            ['name' => 'W3 School', 'url' => 'https://www.w3schools.com/html/'],
            ['name' => 'MDN Web docs', 'url' => 'https://developer.mozilla.org/en-US/'],
            ['name' => 'Wikipedia IT', 'url' => 'https://it.wikipedia.org/wiki/Pagina_principale'],
            ['name' => 'Bootstrap DOC', 'url' => 'https://getbootstrap.com/'],
        ];

        $word_ids = Word::pluck('id')->toArray();
        // $word_ids[] = null;

        foreach($links as $link){
            $new_link = new Link();
            
            $new_link->name = $link['name'];
            $new_link->url = $link['url'];
            $new_link->word_id = Arr::random($word_ids);
            $new_link->save();

        }

        

    }
}
