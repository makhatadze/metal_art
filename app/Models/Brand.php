<?php
/**
 *  app/Models/Brand.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
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

    public function hasImage() {
        return Image::where(['imageable_id' => $this->id, 'imageable_type' => 'App\Models\Brand'])->count();
    }

    /**
     * Get the brand's image.
     */
    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
