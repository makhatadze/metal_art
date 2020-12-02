<?php
/**
 *  app/Models/Image.php
 *
 * User: 
 * Date-Time: 19.10.20
 * Time: 15:31
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name'];

    public function imageable(){
        return $this->morphTo();
    }
}
