<?php

namespace Database\Seeders;

use App\Models\ProjectSparepart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectSparepart::factory(20)->create();
    }
}
