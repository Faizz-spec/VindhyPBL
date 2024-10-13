<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $table = 'spareparts';
    protected $guarded = ['id'];

    public $timestamps = true;

    public function project() {
        return $this->belongsToMany(Project::class, 'projects_spareparts')->withTimestamps();
    }
}
