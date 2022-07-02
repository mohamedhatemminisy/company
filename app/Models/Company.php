<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone', 'city_id', 'area_id'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class,'company_categories');
    }
}
