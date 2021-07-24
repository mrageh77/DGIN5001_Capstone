<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'excerpt' => $this->faker->sentences($nb = 3, $asText = true),
            'description' => $this->faker->paragraphs($nb = 3, $asText = true),
            'skills' => $this->faker->words($nb = 3, $asText = true),

        ];
    }
}
