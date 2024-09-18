<?php

namespace Database\Factories;
use App\Models\Gerai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gerai>
 */
class GeraiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'nama_gerai' => $this->faker->company,
            'status' => 'aktif',
        ];
    }
}
