<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('regions')->delete();
            $region = array(
                array('id' => 1,'name' => "Mindanao"),

                );
                DB::table('regions')->insert($region);
            
    }
}
