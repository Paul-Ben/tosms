<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'faculty_id',
        'name',
    ];

    public function department()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
}
