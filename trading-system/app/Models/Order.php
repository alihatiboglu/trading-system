<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
