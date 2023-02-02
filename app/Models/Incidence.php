<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'slug','type'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
