<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable=[
        'project_id',
        'order_id',
        'parent_id',
        'description'
    ];

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Feature::class,'parent_id');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
