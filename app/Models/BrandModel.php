<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $fillable =['title'];
    protected $table = 'brand_models';
    protected $primarykey = 'id';

    public function brandmodeleable(){
        return $this->morphTo();
    }

    /**
     * Get the user that owns the phone.
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand','id','brandmodeleable_id');
    }
}
