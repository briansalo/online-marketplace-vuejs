<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('cities')->delete();
            $city = array(
                array('id' => 1,'province_id'=>'1','name' => "Buenavista"),
                array('id' => 2,'province_id'=>'1','name' => "Butuan City"),
                array('id' => 3,'province_id'=>'1','name' => "Cabadbaran City"),
                array('id' => 4,'province_id'=>'1','name' => "Carmen"),
                array('id' => 5,'province_id'=>'1','name' => "Jabonga"),
                array('id' => 6,'province_id'=>'1','name' => "Kitcharao"),
                array('id' => 7,'province_id'=>'1','name' => "Las Nieves"),
                array('id' => 8,'province_id'=>'1','name' => "Magallanes"),
                array('id' => 9,'province_id'=>'1','name' => "Nasipit"),
                array('id' => 10,'province_id'=>'1','name' => "Remedios T. Romualdez"),
                array('id' => 11,'province_id'=>'1','name' => "Santiago"),
                array('id' => 12,'province_id'=>'1','name' => "Tubay"),
                array('id' => 13,'province_id'=>'2','name' => "Bayugan City"),
                array('id' => 14,'province_id'=>'2','name' => "Bunawan"),
                array('id' => 15,'province_id'=>'2','name' => "Esperanza"),
                array('id' => 16,'province_id'=>'2','name' => "La Paz"),
                array('id' => 17,'province_id'=>'2','name' => "Prosperidad"),
                array('id' => 18,'province_id'=>'2','name' => "Rosario"),
                array('id' => 19,'province_id'=>'2','name' => "San Francisco"),
                array('id' => 20,'province_id'=>'2','name' => "San Luis"),
                array('id' => 21,'province_id'=>'2','name' => "Santa Josefa"),
                array('id' => 22,'province_id'=>'2','name' => "Sibagat"),
                array('id' => 23,'province_id'=>'2','name' => "Talacogon"),
                array('id' => 24,'province_id'=>'2','name' => "Trento"),
                array('id' => 25,'province_id'=>'2','name' => "Veruela"),
                );
                DB::table('cities')->insert($city);
            
    }
}
