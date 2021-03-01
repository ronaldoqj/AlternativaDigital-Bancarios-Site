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
            'created_at' => Carbon::now()
        ]);
    }
}
