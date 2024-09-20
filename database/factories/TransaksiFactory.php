<?php

namespace Database\Factories;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //protected $model = Transaksi::class;
        return [
            'tanggal' => $this->faker->dateTimeBetween('2024-05-01', '2024-09-21'),
            'nama_gerai' => $this->faker->company(),
            'no_invoice' => $this->faker->randomNumber(8),
            'nama_customer' => $this->faker->name(),
            'jenis_perawatan' => $this->faker->randomElement(['Perawatan Rambut', 'Perawatan Wajah', 'Perawatan Tubuh']),
            'harga_treatment' => $this->faker->randomFloat(2, 10000, 50000),
            'disc' => $this->faker->randomFloat(2, 0, 10),
            'terapist' => $this->faker->name(),
            'pembayaran' => $this->faker->randomElement(['cash', 'transfer', 'qris']),
            'jumlah' => $this->faker->randomFloat(2, 10000, 50000),
            'komisi' => $this->faker->randomFloat(2, 0, 10),
        ];
    }
}
