<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'pic',
        'status_id',
        'owner_id',
        'user_id'
    ];

    public function features(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Feature::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProjectStatus::class,'status_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    function getStatusBadgeClass($status) {
        $classes = [
            'done' => 'bg-success',
            'not_done' => 'bg-warning',
            'end' => 'bg-danger',
        ];
        return $classes[$status] ?? 'bg-secondary';
    }

}
