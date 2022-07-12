<?php

namespace Database\Factories;

use App\Models\livewire;
use Illuminate\Database\Eloquent\Factories\Factory;

class livewireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = livewire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname'=>$this->faker->firstName,
            'lastname'=>$this->faker->lastname,
            'email'=>$this->faker->email,
            'phone'=>'1234567890',
        ];
    }
}
