<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'image'=>"1.png"
        ];
    }
}
// php artisan make:factory MajorFactory --model=Major

// to create model and factory   php artisan make:model Major -mf

// php artisan db:seed
// php artisan migrate:fresh --seed 