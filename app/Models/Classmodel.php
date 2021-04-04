<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classmodel extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
