<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurfaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'clay' => 3,
            'hard' => 4,
            'grass' => 5,
            'artificial' => 3,
        ];

        foreach ($data as $key => $value) {
            DB::table('surfaces')->insert([
                'name' => $key,
                'price' => $value,
            ]);
        }

    }
}
