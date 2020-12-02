<?php
/**
 *  app/Models/Category.php
 *
 * User: 
 * Date-Time: 02.12.20
 * Time: 18:37
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['title_ge', 'title_en','title_ru'];
    protected $table = 'categories';
    protected $primarykey = 'id';
}
