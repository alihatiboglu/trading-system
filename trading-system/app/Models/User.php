<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fname',
        'lname',
        'country_id',
        'phone',
        'platform',
        'currency_code',
        'leverage',
        'account_type',
        'amount',
        'package_id',
        'status',
        'birthdate',
        'country',
        'city',
        'address',
        'postal_code',
        'calling_code',
        'experience',
        'verfied',
        'parent_id',
        'referral_code',
        'type',
        'platform_id',
        'account_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }


    public function referrals()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
}
