<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'slug', 'sku', 'store_id', 'user_id', 'category_id', 'incidence_id', 'description'];

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
    public function statu()
    {
        return $this->belongsTo(Statu::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authorization()
    {
        return $this->belongsTo(Authorization::class);
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
