<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'task_detail_id',
        'media_id',
        'user_id'
    ];

    public function media(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class);
    }
}
