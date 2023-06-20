<?php

namespace Database\Seeders;

// use App\Models\Mahasiswa_Matakuliah;

use App\Models\MahasiswaMatakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mahasiswa_Matakuliah::factory(20)->create();
        MahasiswaMatakuliah::factory(20)->create();
    }
}
