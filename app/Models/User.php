<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const SUPER_ADMIN_ROLE_ID = 1;
    const ADMIN_ROLE_ID = 2;
    const DATA_ENTRY_ROLE_ID = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        if ($this->role_id == self::SUPER_ADMIN_ROLE_ID) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->role_id == self::ADMIN_ROLE_ID) {
            return true;
        }
        return false;
    }

    public function isDataEntryOperator()
    {
        if ($this->role_id == self::DATA_ENTRY_ROLE_ID) {
            return true;
        }
        return false;
    }

    public function applicationForms()
    {
        return $this->hasMany(ApplicationForm::class, 'user_id', 'id');
    }
}
