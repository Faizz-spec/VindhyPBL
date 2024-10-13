<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSparepart extends Model
{
    use HasFactory;

    protected $table = 'projects_spareparts';
    protected $guarded = ['id'];
}
