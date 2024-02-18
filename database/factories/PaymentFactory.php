<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status= $this->faker->randomElement(['Pending','Validated', 'Canceled']);

        return [
            'member_id'=> Member::factory(),
            'amount' => $this->faker->numberBetween(5,500),            
            'status'=> $status,
            'paymentDate' => $this->faker->dateTimeThisDecade(),
            'validationDate' => $status == 'Validated' ? $this->faker->dateTimeThisDecade() : NULL,
            'cancelationDate' => $status == 'Canceled' ? $this->faker->dateTimeThisDecade() :NULL
        ];
    }
}
