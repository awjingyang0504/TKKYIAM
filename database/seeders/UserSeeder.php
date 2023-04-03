<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin1',
            'email'=> 'admin1@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '1',
        ]);
        User::create([
            'name' => 'participant1',
            'email'=> 'participant1@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant2',
            'email'=> 'participant2@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant3',
            'email'=> 'participant3@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant4',
            'email'=> 'participant4@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant5',
            'email'=> 'participant5@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant6',
            'email'=> 'participant6@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant7',
            'email'=> 'participant7@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant8',
            'email'=> 'participant8@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant9',
            'email'=> 'participant9@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
        User::create([
            'name' => 'participant10',
            'email'=> 'participant10@gmail.com  ',
            'password'=> Hash::make("12345678"),
            'role_id'=> '2',
        ]);
    }
}
