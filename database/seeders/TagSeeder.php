<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $word_ids = Word::pluck('id')->toArray();

        $tags = [
            ['label' => 'HTML', 'color' => '#dc3545'],
            ['label' => 'CSS', 'color' => '#0d6efd'],
            ['label' => 'ES6', 'color' => '#ffc107'],
            ['label' => 'Bootstraap', 'color' => '#212529'],
            ['label' => 'Vue', 'color' => '#198754'],
            ['label' => 'SQL', 'color' => '#6c757d'],
            ['label' => 'php', 'color' => '#0dcaf0'],
            ['label' => 'Laravel', 'color' => '#4f1117'],
        ];




        foreach ($tags as $tag) {
            $new_tag = new Tag();

            $new_tag->label = $tag['label'];
            $new_tag->color = $tag['color'];

            $new_tag->save();

            

            // $words_tag = [];
            // foreach ($word_ids as $word_id) {
            //     if (rand(0, 1)) $words_tag[] = $word_id;
            // }
            // $new_tag->words()->attach($words_tag);
            
        }


        


    }
}
