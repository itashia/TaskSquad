<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaProject extends Model
{
    use HasFactory;

    protected $fillable=[
        'media_id',
        'project_id'
    ];
}
