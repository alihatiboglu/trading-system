<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class TypeAccount extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'content'];

    protected $table = 'type_accounts';
    protected $fillable = [];

}
