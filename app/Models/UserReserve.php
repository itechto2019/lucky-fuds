<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_info_id',
        'package_id',
        'contact',
        'email',
        'date',
        'time',
        'address',
        'guest',
        'event'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function info() {
        return $this->belongsTo(UserInfo::class, "user_info_id");
    }
    public function reserve() {
        return $this->hasOne(ForReserve::class);
    }
    public function package() {
        return $this->belongsTo(Package::class);
    }
}
