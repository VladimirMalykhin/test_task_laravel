<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IntervalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $intervals = [];
        $valueMax = 1000;
        for ($i = 0; $i < 10000; $i++) {
            $start = $faker->numberBetween(1, $valueMax);
            $intervals[] = [
                'start' => $start,
                'end' => $faker->boolean(70) ? $faker->numberBetween($start, $valueMax + 1) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('intervals')->insert($intervals);
    }
}
