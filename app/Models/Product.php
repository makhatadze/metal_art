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
        'title_ge',
        'title_en',
        'title_ru',
        'description_ge',
        'description_en',
        'description_ru',
        'price',
        'is_sale',
        'sale',
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
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function hasImage() {
        return Image::where(['imageable_id' => $this->id, 'imageable_type' => 'App\Models\Product'])->count();
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'product_sub_category');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'products_sizes');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'products_colors');
    }

}
