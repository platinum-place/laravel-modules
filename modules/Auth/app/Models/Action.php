<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'name',
    ];
}
