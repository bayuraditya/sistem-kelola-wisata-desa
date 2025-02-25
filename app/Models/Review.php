<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'rating',
        'review',
        'status',
        'destination_id'
    ];

    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
