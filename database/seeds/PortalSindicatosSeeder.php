<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PortalSindicatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portal_sindicatos')->insert([
            'name' => 'Portal',
            'created_at' => Carbon::now()
        ]);
        DB::table('portal_sindicatos')->insert([
            'name' => 'Sindicato de Camaquã',
            'created_at' => Carbon::now()
        ]);
    }
}
