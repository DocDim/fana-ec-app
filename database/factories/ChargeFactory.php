<?php

namespace Database\Factories;

use App\Models\Charge;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charge>
 */
class ChargeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status= $this->faker->randomElement(['Billed', 'Canceled']);

        return [
            'member_id'=> Member::factory(),
            'amount' => $this->faker->numberBetween(5,500),            
            'status'=> $status,
            'creationDate' => $this->faker->dateTimeThisDecade(),            
            'cancelationDate' => $status == 'Canceled' ? $this->faker->dateTimeThisDecade() :NULL
        ];
    }
}
