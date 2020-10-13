<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable =['title_ge', 'title_en'];
    protected $table = 'deals';
    protected $primarykey = 'id';
}
