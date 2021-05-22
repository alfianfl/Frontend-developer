<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paper extends Model
{
    use HasFactory;
    protected $table = 'papers';
    protected $primaryKey = 'paper_id';
    protected $fillable = [
        'full_paper',
        'tittle',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function conference()
    {
        return $this->belongsTo(conference::class, 'conference_id');
    }
}
