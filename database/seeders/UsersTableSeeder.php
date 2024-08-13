<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        DB::table('users')->insert([
            [
                'name' => 'donia-saeed',
                'email' => 'doniasaeed010@gmail.com',
                'password' => Hash::make('12345678'),
                'balance'=>0,
                'photo'=>'assets/img/nophoto.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
