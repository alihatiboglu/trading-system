<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Package extends Model
{
    use HasTranslations;
    public $translatable = ['name','content'];

    protected $table = 'packages';
    protected $fillable = [];

}
