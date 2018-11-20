<?php

use Illuminate\Database\Seeder;
use App\User;
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
            'name' => 'admin',
            'email' => 'admin@ad.min',
            'password' => bcrypt('111111'),
            'is_admin' => 1,
        ]);

    }
}
