<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Translatable\HasTranslations;


class Item extends Model
{
    use HasTranslations;
    public $translatable = ['name', 'content', 'description' , 'meta_title', 'meta_description'];

    protected $table = 'items';
    protected $fillable = [];

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
