<?php
/**
 *  app/Models/Category.php
 *
 * User: 
 * Date-Time: 03.12.20
 * Time: 10:44
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['title_ge', 'title_en','title_ru'];
    protected $table = 'categories';
    protected $primarykey = 'id';

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_sub_category');
    }
}
