<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }
    public function incidence()
    {
        return $this->belongsTo(Incidence::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
