<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =['title'];
    protected $table = 'brands';
    protected $primarykey = 'id';

    /**
     * Get the user's image.
     */
    public function brandModel()
    {
        return $this->morphOne('App\Models\BrandModel', 'brandmodeleable');
    }

    /**
     * Get the brand's image.
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
