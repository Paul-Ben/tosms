<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicationId' ,
            'firstname',
            'middlename',
            'lastname',
            'email',
            'phone',
            'address',
            'city',
            'state' ,
            'lga' ,
            'nationality',
            'gender' ,
            'maritalStatus' ,
            'religion',
            'fslc',
            'olevel',
    ];

}
