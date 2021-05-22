<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abstract_paper extends Model
{
    use HasFactory;
    protected $table = 'abstract_papers';
    protected $primaryKey = 'abstract_id';
    protected $fillable = [
        'abstract',
        'title',
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
