<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class File extends Model
{

    protected $table = 'files';
    protected $fillable = [];

    public function staff()
    {
        return $this->belongsTo(User::class, 'added_to', 'id');
    }

}
