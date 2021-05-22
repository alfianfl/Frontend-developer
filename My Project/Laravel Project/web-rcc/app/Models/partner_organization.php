<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partner_organization extends Model
{
    use HasFactory;
    protected $table = 'partner_organizations';
    protected $primaryKey = "partner_id";
    protected $fillable = [
        'partner_name',
        'partner_picture',
        'address_organization',
        'conference_id',
    ];
    protected $hidden = [
        'password',
    ];
}
