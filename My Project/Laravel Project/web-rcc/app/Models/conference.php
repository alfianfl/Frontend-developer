<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conference extends Model
{
    use HasFactory;

    protected $table = 'conferences';
    protected $primaryKey = 'conference_id';

    public function abstract()
    {
        return $this->hasMany(abstract_paper::class);
    }
    // public function member()
    // {
    //     return $this->hasMany(member::class);
    // }
    public function paper()
    {
        return $this->hasMany(paper::class);
    }
    public function pesanan()
    {
        return $this->hasMany(pesanan::class, 'conference_id');
    }
    public function audience()
    {
        return $this->hasMany(audience_conference::class, 'conference_id');
    }
    public function keynote()
    {
        return $this->hasMany(KeynoteSpeaker::class, 'conference_id');
    }
    public function scientific()
    {
        return $this->hasMany(scientific_commite::class, 'conference_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conference_title',
        'conference_theme',
        'conference_place',
        'conference_description',
        'conference_scope',
        'status',
    ];
}
