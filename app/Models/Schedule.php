<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['train_id', 'departure_time', 'arrival_time'];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}