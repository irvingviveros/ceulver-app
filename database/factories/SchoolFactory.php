<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\School\Model\School;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_name' => $this->faker->company,
            'school_code' => $this->faker->regexify('[A-Z0-9]{5}'),
            'registration_date' => $this->faker->date,
            'phone' => $this->faker->numerify('##########'),
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'educational_system_id' => $this->faker->numberBetween(1, 5),
            'created_by' => 1,
            'modified_by' => 1,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
