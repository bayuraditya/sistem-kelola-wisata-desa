<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    use HasFactory;
    protected $table = 'destination_images';
    protected $fillable = ['image','destination_id'];
    
    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
