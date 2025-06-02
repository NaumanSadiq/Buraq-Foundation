<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approvedByAdmin()
    {
        return $this->belongsTo(User::class, 'approved_by_admin_id', 'id');
    }


    public function approvedBySuperAdmin()
    {
        return $this->belongsTo(User::class, 'approved_by_super_admin_id', 'id');
    }
}
