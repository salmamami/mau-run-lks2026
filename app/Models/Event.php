<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_event',
        'event_type_id',
        'city_id',
        'tanggal',
        'harga',
        'kuota',
        'deskripsi',
        'image',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}