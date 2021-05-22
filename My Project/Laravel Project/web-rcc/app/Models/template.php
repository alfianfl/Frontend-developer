<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class template extends Model
{
    use HasFactory;

    public function conference()
    {
        return $this->belongsTo(conference::class, 'conference_id');
    }
}
