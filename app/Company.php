<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'code', 'objective','register_address','postal_code', 'ds_division', 'gs_division','landline',
        'mobile', 'email', 'flag',
    ];
}
