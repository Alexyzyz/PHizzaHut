<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username'  => 'Admin',
            'email'     => 'admin@phizzahut.com',
            'password'  => Hash::make('admin1'),
            'address'   => 'Bekasi, Jawa Barat',
            'phone'     => '0123456789',
            'gender'    => 'female',
            'role'      => 'admin'
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username'  => 'Bryan Christian',
            'email'     => 'bryan@mail.com',
            'password'  => Hash::make('bryan123'),
            'address'   => 'Jakarta, Jawa Barat',
            'phone'     => '1234567890',
            'gender'    => 'male',
            'role'      => 'member'
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username'  => 'Christopher Daniel',
            'email'     => 'chris@mail.com',
            'password'  => Hash::make('chris123'),
            'address'   => 'Jakarta, Jawa Barat',
            'phone'     => '2345678901',
            'gender'    => 'male',
            'role'      => 'member'
        ]);
    }
}
