<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable=[
        'type_id',
        'subject',
        'user_id',
        'owner_id',
        'due_date',
        'number',
        'priority_id',
        'status_id'
    ];

}
