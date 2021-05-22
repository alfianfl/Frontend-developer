<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeynoteSpeaker extends Model
{
    use HasFactory;
    protected $table = 'keynote_speakers';
    protected $primaryKey = 'keynote_id';

    protected $fillable = [
        'image',
        'name',
        'institution',
    ];
    public function conference()
    {
        return $this->belongsTo(conference::class, 'conference_id');
    }
}
