<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskView extends Model
{
    use HasFactory;

    protected $fillable=[
        'task_detail_id',
        'user_id'
    ];
}
