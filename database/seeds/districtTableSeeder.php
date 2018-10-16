<?php

use Illuminate\Database\Seeder;

use Faker\Factory;

class districtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        for($i=0; $i<10;$i++){
            $district = [

                'Name'=> $fake->name,
                
            ];
            DB::table('district')->insert($district);
        }
    }
}
