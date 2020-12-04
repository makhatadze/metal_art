<?php
/**
 *  app/Models/SubCategory.php
 *
 * User: 
 * Date-Time: 04.12.20
 * Time: 13:34
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable =['title_ge', 'title_en','title_ru'];
    protected $table = 'sub_categories';
    protected $primarykey = 'id';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_sub_category');
    }
}
