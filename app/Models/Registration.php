<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'nama_lengkap',
        'email',
        'no_hp',
        'jenis_kelamin',
        'ukuran_jersey',
        'kode_kupon',
        'diskon',
        'total_bayar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}