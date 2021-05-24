<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SindicatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sindicatos')->insert([
            'name' => 'Sindicato de Porto Alegre',
            'created_at' => Carbon::now()
        ]);
    }
}
