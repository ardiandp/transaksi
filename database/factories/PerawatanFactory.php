<?php

namespace Database\Factories;
use App\Models\Perawatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perawatan>
 */
class PerawatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->unique()->word(),
            'deskripsi' => $this->faker->paragraph(),
            'durasi' => $this->faker->numberBetween(30, 120),
            'harga' => $this->faker->numberBetween(50000, 500000),
        ];
    }
}
