<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primaryKey = 'member_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    // public function conference()
    // {
    //     return $this->belongsTo(conference::class, 'conference_id');
    // }
}
