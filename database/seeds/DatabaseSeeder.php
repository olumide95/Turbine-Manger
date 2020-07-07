<?php

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
        $this->call(SystemsTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
        $this->call(TurbinesTableSeeder::class);

        }
}
