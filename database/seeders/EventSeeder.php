<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::insert([
            [
                'nama_event' => 'Grow Run 2026',
                'event_type_id' => 5,
                'city_id' => 2,
                'tanggal' => '2026-02-15',
                'harga' => 200000,
                'kuota' => 2000,
                'deskripsi' => 'Benefit: Jersey, BIB Number, Medal, Refreshment, Water Station, Doorprize',
            ],
            [
                'nama_event' => 'H Run 2026',
                'event_type_id' => 2,
                'city_id' => 2,
                'tanggal' => '2026-05-28',
                'harga' => 100000,
                'kuota' => 5000,
                'deskripsi' => 'Benefit: Jersey, BIB Number, Medal, Refreshment, Water Station, Doorprize',
            ],
            [
                'nama_event' => 'HRSIY PDHI Fun Run',
                'event_type_id' => 3,
                'city_id' => 1,
                'tanggal' => '2026-07-08',
                'harga' => 500000,
                'kuota' => 5000,
                'deskripsi' => 'Benefit: Jersey, BIB Number, Medal, Refreshment, Water Station, Doorprize',
            ],
            [
                'nama_event' => 'Sae Run',
                'event_type_id' => 1,
                'city_id' => 5,
                'tanggal' => '2026-02-08',
                'harga' => 400000,
                'kuota' => 500,
                'deskripsi' => 'Benefit: Jersey, BIB Number, Medal, Refreshment, Water Station, Doorprize',
            ],
        ]);
    }
}