<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RicheKnowledgeBase extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
