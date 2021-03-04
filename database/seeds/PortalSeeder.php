<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portal')->insert([
            'id' => 1,
            'created_at' => Carbon::now()
        ]);
        
        DB::table('portal')->insert([
            'id' => 2,
            'created_at' => Carbon::now()
        ]);
    }
}
