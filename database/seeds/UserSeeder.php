<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ronaldo Quionha de Jesus',
            'email' => 'developer.ronaldoqj@gmail.com',
            'image' => '1-developer.ronaldoqj@gmail.com.jpg',
            'perfil' => 'master',
            'password' => Hash::make('Master123#'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Marcelo Silveira de Almeida',
            'email' => 'marcelo.almeida@alternativadigital.com.br',
            'image' => '2-marcelo.almeida@alternativadigital.com.br.jpg',
            'perfil' => 'master',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administrator@administrator.com.br',
            'image' => '3-administrator@administrator.com.br.jpg',
            'perfil' => 'administrator',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Normal',
            'email' => 'normal@normal.com.br',
            'image' => '4-normal@normal.com.br',
            'perfil' => 'normal',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);
    }
}
