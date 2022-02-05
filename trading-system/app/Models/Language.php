<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Language extends Model
{

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
