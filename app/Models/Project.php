<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $guarded = ['id'];
    public $timestamps = true;

    public function sparepart() {
        return $this->belongsToMany(Sparepart::class, 'projects_spareparts')->withTimestamps();
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
