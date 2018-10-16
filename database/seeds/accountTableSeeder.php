<?php

use Illuminate\Database\Seeder;
use Faker\Factory;


class accountTableSeeder extends Seeder
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
            $account = [
                // $table->increments('id');
                // $table->string('bame');
                // $table->string('birthday');
                // $table->string('addr');
                // $table->integer('wards');
                // $table->integer('District');
                'name'=> $fake->name,
                'birthday'=> $fake->date,
                'addr'=>$fake->address,
                'wards_id'=>rand(1,100),
                'district_id'=>rand(1,10)
            ];
            DB::table('account')->insert($account);
        }
    }
}
