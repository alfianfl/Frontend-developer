<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scientific_commite extends Model
{
    use HasFactory;
    protected $table = 'scientific_commites';
    protected $primaryKey = 'scientific_id';
    protected $fillable = [
        'name',
        'conference',
    ];
    public function conference()
    {
        return $this->belongsTo(conference::class, 'conference_id');
    }
}
