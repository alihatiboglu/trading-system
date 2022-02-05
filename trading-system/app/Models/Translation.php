<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
    use HasTranslations;
    public $translatable = ['text'];
    protected $table = 'translations';
    protected $fillable = [];
}
