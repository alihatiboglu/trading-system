<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
