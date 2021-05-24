<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Ronaldo Quionha de Jesus',
            'email' => 'developer.ronaldoqj@gmail.com',
            'perfil' => 'master',
            'company' => 'Alternativa Digital',
            'position' => 'CO / PO',
            'password' => Hash::make('Master123#'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Marcelo Silveira de Almeida',
            'email' => 'marcelo.almeida@alternativadigital.com.br',
            'perfil' => 'master',
            'company' => 'Alternativa Digital',
            'position' => 'CO / PO',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'administrator@administrator.com.br',
            'perfil' => 'administrator',
            'company' => 'Alternativa Digital',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Normal',
            'email' => 'normal@normal.com.br',
            'image' => '4-normal@normal.com.br',
            'perfil' => 'normal',
            'company' => 'Alternativa Digital',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()
        ]);
    }
}
