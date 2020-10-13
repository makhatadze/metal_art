<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;
    protected $fillable =['title_ge', 'title_en'];
    protected $table = 'engines';
    protected $primarykey = 'id';
}
