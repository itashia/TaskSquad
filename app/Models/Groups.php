<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'type',
        'logo'
    ];

    public function groups(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Groups::class,'type','id');
    }
}
