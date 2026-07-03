<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::insert([
            ['name' => '3K'],
            ['name' => '5K'],
            ['name' => '10K'],
            ['name' => 'Half Marathon'],
            ['name' => 'Full Marathon'],
        ]);
    }
}
