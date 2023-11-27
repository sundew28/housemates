<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\CommonSizeEnum;
use App\Models\Rooms;
use App\Models\Properties;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms>
 */
class RoomsFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = Rooms::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Properties::all()->random()->id,
            'name' => $this->faker->lexify ('????????????????????'),
            'size' => $this->faker->randomFloat(2).CommonSizeEnum::randomValue(),
        ];
    }
}
