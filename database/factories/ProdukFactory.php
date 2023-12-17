<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Produk::class;
    public function definition()
    {
        return [
            'kode' => $this->faker->unique()->randomNumber(5),
            'nama' => $this->faker->word,
            'harga' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
