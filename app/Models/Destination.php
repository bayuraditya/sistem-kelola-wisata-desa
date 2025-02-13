<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'location',
        'entry_fee',
        'opening_time',
        'closed_time',
        'handphone_number',
        'email',
        'instagram',
        'tiktok',
        'facebook',
        'youtube',
        'destination_image_id',
        'category_id',
        'user_id'
    ];

    public function reviews()
    {
        return $this->belongsTo(Review::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination_image(){
        return $this->hasMany(DestinationImage::class);
    }

}
