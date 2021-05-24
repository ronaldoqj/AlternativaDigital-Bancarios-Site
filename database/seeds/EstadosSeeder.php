<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'sigla' => 'AC',
            'estado' => 'Acre'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'AL',
            'estado' => 'Alagoas'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'AP',
            'estado' => 'Amapá'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'AM',
            'estado' => 'Amazonas'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'BA',
            'estado' => 'Bahia'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'CE',
            'estado' => 'Ceará'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'ES',
            'estado' => 'Espírito Santo'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'GO',
            'estado' => 'Goiás'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'MA',
            'estado' => 'Maranhão'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'MT',
            'estado' => 'Mato Grosso'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'MS',
            'estado' => 'Mato Grosso do Sul'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'MG',
            'estado' => 'Minas Gerais'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'PA',
            'estado' => 'Pará'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'PB',
            'estado' => 'Paraíba'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'PR',
            'estado' => 'Paraná'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'PE',
            'estado' => 'Pernambuco'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'PI',
            'estado' => 'Piauí'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'RJ',
            'estado' => 'Rio de Janeiro'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'RN',
            'estado' => 'Rio Grande do Norte'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'RS',
            'estado' => 'Rio Grande do Sul'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'RO',
            'estado' => 'Rondônia'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'RR',
            'estado' => 'Roraima'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'SC',
            'estado' => 'Santa Catarina'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'SP',
            'estado' => 'São Paulo'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'SE',
            'estado' => 'Sergipe'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'TO',
            'estado' => 'Tocantins'
        ]);
        DB::table('estados')->insert([
            'sigla' => 'DF',
            'estado' => 'Distrito Federal'
        ]);
    }
}
