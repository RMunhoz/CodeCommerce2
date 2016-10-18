<?php

use CodeCommerce\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Rogerio Munhoz',
            'email' => 'rogerio_munhoz@hotmail.com.br',
            'password' => Hash::make(123456),
            'remember_token' => str_random(10),
        ]);
        factory(User::class, 9)->create();
    }
}
