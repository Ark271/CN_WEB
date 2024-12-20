<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $index . '-PC' . rand(1, 50),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-10700', 'AMD Ryzen 5 5600G']),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
