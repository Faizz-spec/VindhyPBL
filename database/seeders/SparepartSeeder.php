<?php

namespace Database\Seeders;

use App\Models\Sparepart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sparepart::factory(10)->create();
    }
}
