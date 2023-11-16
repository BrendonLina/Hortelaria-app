<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_checkin',
        'data_checkout',
        'quarto_id',
        'user_id'
    ];

    public function quarto()
    {
        return $this->belongsTo(Quarto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
