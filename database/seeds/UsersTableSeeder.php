<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@email.com',  
                'password'       => '$2y$10$GdubO8p..1F4Ic60m0e6Nu3H.0T5k6fhRmd3ozDuqaN.dBD83J9ue',
            ],
             
        ]);
    }
}
