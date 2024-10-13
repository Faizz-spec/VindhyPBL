<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->catchPhrase(),
            'deskripsi' => fake()->sentence(),
            'image' => fake()->imageUrl(360, 360, 'project', true, 'cats'),
            'status_id' => Status::all()->random(),
            'category_id' => Category::all()->random(),
            'harga_total' => fake()->randomNumber(7),
            'customer_name' => fake()->name(),
            'code_project' => Str::random(5),
            'created_at' => fake()->dateTime()
        ];
    }
}
