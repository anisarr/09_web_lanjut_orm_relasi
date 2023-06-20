<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nim' => '2141720'.$this->faker->unique()->randomNumber(3, true),
            'Nama' => fake()->name(),
            'Tanggal_Lahir'=> $this->faker->date(),
            'kelas_id'=>$this->faker->numberBetween(1, 9),
            'Jurusan' => 'Teknologi Informasi',
            'No_Handphone' => '0812'.$this->faker->unique()->randomNumber(8, true),
            'Email' => fake()->unique()->safeEmail(),
            
        ];
    }
}
