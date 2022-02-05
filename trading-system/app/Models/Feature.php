<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasTranslations;
    public $translatable = ['name','description','content'];

    protected $table = 'features';
    protected $fillable = [];

}
