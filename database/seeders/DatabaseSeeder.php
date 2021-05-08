<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Tenant;
use App\Models\Transaction;
use App\Models\User;
use Database\Factories\AccountFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(20)->create();
        Product::factory(20)->create();
        Customer::factory(20)->create();
        Tenant::factory(20)->create();
        Account::factory(20)->create();
        Transaction::factory(20)->create();
    }
}
