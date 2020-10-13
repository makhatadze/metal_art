<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'model_id',
        'category_id',
        'fuel_id',
        'transmission_id',
        'engine_id',
        'condition_id',
        'deal_id',
        'title_ge',
        'title_en',
        'description_ge',
        'description_en',
        'price',
        'luggage',
        'mileage',
        'people',
        'door',
        'wheel',
        'custom',
        'created_date',
        'engine_capacity',
        'new',
        'vip',
        'status'
    ];
    protected $table = 'products';
    protected $primarykey = 'id';

    /**
     * Get the user's image.
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
