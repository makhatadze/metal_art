<?php
/**
 *  app/Models/Product.php
 *
 * User: 
 * Date-Time: 19.10.20
 * Time: 15:31
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
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
        'deal_id',
        'title_ge',
        'title_en',
        'description_ge',
        'description_en',
        'price',
        'mileage',
        'wheel',
        'custom',
        'phone',
        'created_date',
        'engine_capacity',
        'vip',
        'drive',
        'status'
    ];
    protected $table = 'products';
    protected $primarykey = 'id';

    /**
     * Get the user's image.
     */
    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function transmission(){
        return $this->hasOne('App\Models\Transmission', 'id','transmission_id');
    }

    public function brand(){
        return $this->hasOne('App\Models\Brand', 'id','brand_id');
    }

    public function model(){
        return $this->hasOne('App\Models\BrandModel', 'id','model_id');
    }

    public function category(){
        return $this->hasOne('App\Models\Category', 'id','category_id');
    }

    public function fuel(){
        return $this->hasOne('App\Models\Fuel', 'id','fuel_id');
    }


    public function deal(){
        return $this->hasOne('App\Models\Deal', 'id','deal_id');
    }

}
