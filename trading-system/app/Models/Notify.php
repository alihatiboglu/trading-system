<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Notify extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['rel_id','rel_type','category', 'url', 'name', 'seen', 'to', 'to_id'];

}
