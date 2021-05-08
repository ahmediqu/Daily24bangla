<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => 1,
            'transactions_type' => $this->faker->randomElement(['debit','credit']),
            'transactions' => $this->faker->numberBetween(10, 100),
            'transactions_note' => $this->faker->sentence,
        ];
    }
}
