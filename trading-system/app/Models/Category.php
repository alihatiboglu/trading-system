<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'content', 'description' , 'meta_title', 'meta_description'];

    protected $table = 'categories';
    protected $fillable = [];

}
