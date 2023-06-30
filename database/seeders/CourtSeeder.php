<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('courts')->insert([
                'name' => 'Court no.' . $i . ' outside',
                'surface_id' => rand(1, 4),
            ]);

            DB::table('courts')->insert([
                'name' => 'Court no.' . $i . ' inside',
                'surface_id' => rand(1, 4),
            ]);
        }
    }
}
