<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'task_id',
        'description',
        'user_id',
        'action_type_id',
        'action_id'
    ];
}
