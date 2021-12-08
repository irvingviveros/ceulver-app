<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Infrastructure\Agreement\Model\Agreement;

class AgreementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Agreement::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Normal', 'Becado', 'Deportes', 'Pago día 30', 'Pago día 15', 'Pago día 7']),
            'note' => $this->faker->text(80),
            'status' => rand(0,1),
            'created_by' => 0,
            'modified_by' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
