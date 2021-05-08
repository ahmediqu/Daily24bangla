<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_name' => $this->faker->company,
            'address' => $this->faker->address,
            'balance' => $this->faker->numberBetween(10, 1000),
            'account_author_number' => $this->faker->phoneNumber,
            'account_author_email' => $this->faker->email,
            'account_author_address' => $this->faker->address,
            'note' => $this->faker->paragraph,
            'tenant_id' => 1,
        ];
    }
}
