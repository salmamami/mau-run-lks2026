<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            ['name' => 'Jakarta'],
            ['name' => 'Yogyakarta'],
            ['name' => 'Semarang'],
            ['name' => 'Kendal'],
            ['name' => 'Probolinggo'],
        ]);
    }
}
