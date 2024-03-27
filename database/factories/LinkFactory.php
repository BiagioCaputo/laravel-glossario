<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Word;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $word_ids = Word::pluck('id')->toArray(); //pluck trasforma l'array di oggetti in un array associativo
        $word_ids[] = null; //aggiungo all'array il null nel caso non avessi nessun tipo selezionato

        return [
            'label' => fake()->text(20),
            'url' => fake()->url(),
            'word_id' => Arr::random($word_ids),
        ];
    }
}
