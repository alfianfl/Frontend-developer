<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';

    protected $fillable = [
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'address_id',
    ];
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
