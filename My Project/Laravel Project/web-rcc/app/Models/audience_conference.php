<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audience_conference extends Model
{
    use HasFactory;
    protected $table = 'audience_conferences';
    protected $primaryKey = 'audience_id';
    protected $fillable = [
        'name',
    ];
    public function conference()
    {
        return $this->belongsTo(conference::class, 'conference_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
