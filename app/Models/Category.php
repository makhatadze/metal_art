<?php
/**
 *  app/Models/Category.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:30
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =['title_ge', 'title_en'];
    protected $table = 'categories';
    protected $primarykey = 'id';
}
