<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Course extends Model
{
    use HasTranslations;
    public $translatable = ['name','description','content'];

    protected $table = 'courses';
    protected $fillable = [];

}
