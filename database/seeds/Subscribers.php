<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Subscribers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('subscribers')->truncate();
        for($i = 0; $i<10; $i++){
            DB::table('subscribers')->insert([
                'name'=>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email'=>$faker->safeEmail,
                'subscribed'=>false
            ]);
        }
    }
}
