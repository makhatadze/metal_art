<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable =['title_ge','title_en','title_ru'];
    protected $table = 'colors';
    protected $primarykey = 'id';
}
