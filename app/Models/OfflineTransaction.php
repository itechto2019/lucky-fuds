<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_rent',  
        'transaction',
    ];
}
