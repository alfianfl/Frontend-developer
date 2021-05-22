<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';
    protected $fillable = [
        'bukti_pembayaran',
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
