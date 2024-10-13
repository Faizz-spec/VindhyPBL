<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $guarded = ['id'];

    public $timestamps = true;

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
