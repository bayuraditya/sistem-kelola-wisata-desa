<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    use HasFactory;
    protected $table = 'destination_image';
    protected $fillable = ['image','destination_id'];
    
    public function destination(){
        return $this->belongsTo(Destination::class);
    }
}
