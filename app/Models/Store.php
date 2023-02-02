<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug','address'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function authorization()
    {
        return $this->belongsTo(Authorization::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
