<?php

namespace Database\Seeders;

use ahsanraza1\builtinchat\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];
        for( $i=1; $i<=10; $i++){
            $users[]=[
                    "name"=>"User{$i}",
                    "email"=>"user{$i}@gmail.com",
                    "password"=>Hash::make("12345678")
            ];
        }
            User::insert($users);
    }
}
