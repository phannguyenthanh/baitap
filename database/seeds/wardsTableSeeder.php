<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class wardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        for($i=0; $i<100;$i++){
            $wards = [
                'name'=> $fake->name,
                'district_id'=>rand(1,10)

            ];
            DB::table('wards')->insert($wards);
        }
    }
}
