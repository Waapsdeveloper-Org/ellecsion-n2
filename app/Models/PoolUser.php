<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolUser extends Model
{
    use HasFactory;
    protected $fillable = ['pool_id','user_id'];

}
