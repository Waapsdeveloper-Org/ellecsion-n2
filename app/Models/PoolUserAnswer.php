<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolUserAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','pool_id','question_id','answer_id','answer'];
}
