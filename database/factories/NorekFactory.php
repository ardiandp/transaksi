<?php

namespace Database\Factories;
use App\Models\Norek;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Norek>
 */
class NorekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //protected $model = Norek::class;
    public function definition(): array
    {
        return [
            'atas_nama' => $this->faker->name,
            'alias' => $this->faker->word,
            'norek' => $this->faker->numerify('###-###-###-###'),
            'bank' => $this->faker->randomElement(['BCA', 'BNI', 'BRI']),
        ];
    }
}
