<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $city = $this->faker->city;
        $state = $this->faker->state;

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence(32),
            'transaction_type' => $this->faker->numberBetween(0, 1),
            'price' =>  $this->faker->numberBetween(0,10000000),
            'transaction_type' => $this->faker->numberBetween(0, 1),
            'type' => $this->faker->numberBetween(0, 1),
            'city' => $city,
            'state' => $state,
            'address_slug' => Str::slug($city . '-' . $state),
            'neighborhood' => Str::slug($this->faker->streetName)
        ];
    }
}
