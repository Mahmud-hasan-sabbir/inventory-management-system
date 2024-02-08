<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_name',
        'com_email',
        'com_phone',
        'com_mobile',
        'com_city',
        'com_country',
        'com_zipcode',
        'com_address',
        'com_logo',
    ];
}


