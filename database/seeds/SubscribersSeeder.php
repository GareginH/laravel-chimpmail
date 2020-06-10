<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);
        DB::table('subscribers')->truncate();
        for($i = 0; $i<10; $i++){
            DB::table('subscribers')->insert([
                'name'=>$faker->firstName,
                'lastname'=>$faker->lastName,
                'email'=>Str::random(5)."@gmail.com",
                'subscribed'=>false
            ]);
        }
    }
}
