<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable = ['name', 'url', 'description', 'price', 'category_id'];


    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('orderByPrice', function (Builder $builder) {
            $builder->orderBy('price', 'DESC');
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
