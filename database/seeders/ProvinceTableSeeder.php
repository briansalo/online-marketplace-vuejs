<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('provinces')->delete();
            $province = array(
                array('id' => 1,'region_id'=>'1','name' => "Agusan Del Norte"),
                array('id' => 2,'region_id'=>'1','name' => "Agusan Del Sur"),
                );
                DB::table('provinces')->insert($province);
            
    }
}
