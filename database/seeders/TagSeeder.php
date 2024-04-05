<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Word;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $word_ids = Word::pluck('id')->toArray();

        $tags = [
            [
                'label' => 'HTML', 'color' => '#F16529'
            ],
            [
                'label' => 'CSS', 'color' => '#2465F1'
            ],
            [
                'label' => 'JS', 'color' => '#FFD600'
            ],
            [
                'label' => 'Vue', 'color' => '#00C180'
            ],
            [
                'label' => 'Git', 'color' => '#7409F6'
            ],
            [
                'label' => 'Laravel', 'color' => '#D53434'
            ],
            [
                'label' => 'SQL', 'color' => '#F29111'
            ],
            [
                'label' => 'PHP', 'color' => '#787CB4'
            ],
            [
                'label' => 'Programmazione', 'color' => '#B0C4DE'
            ],
            [
                'label' => 'OOP', 'color' => '#FA8072'
            ],
        ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->label = $tag['label'];
            $new_tag->slug = Str::slug($tag['label']);
            $new_tag->color = $tag['color'];
            $new_tag->save();

            $tag_words = [];
            foreach ($word_ids as $word_id){
                if(rand(0, 1)) $tag_words[] = $word_id;
            }

            $new_tag->words()->attach($tag_words);

        }
    }
}
