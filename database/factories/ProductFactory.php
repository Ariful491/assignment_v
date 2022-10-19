<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
/*
 *
 *  php artisan tinker

Product::factory()->count(20)->create()
*/

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => rand(1,2),
            'price' => rand(200,400),
            'size' => array_rand(['2','3','10','20'],1),
            'litter' => array_rand(['20','300','1000','2000'],1),
            'color' => $this->faker->colorName,
            'details'=>$this->faker->text,
            'status' => rand(1,2),
            'photo'=>$this->faker->image

        ];
    }
}
