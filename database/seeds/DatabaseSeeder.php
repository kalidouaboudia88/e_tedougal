<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *php artisan db:seed
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SellerTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
