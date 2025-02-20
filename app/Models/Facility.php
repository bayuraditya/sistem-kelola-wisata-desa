<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facilities';
    protected $fillable = [
        'name',
        'description'
    ];
    public function destinations(){
        return $this->belongsToMany(Destination::class, 'destination_facility','facility_id','destination_id');
    }
    public function facilityImages(){
        return $this->hasMany(FacilityImage::class);
    }


}
