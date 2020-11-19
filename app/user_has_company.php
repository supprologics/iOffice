<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_has_company extends Model
{
    protected $fillable = [
        'user_id', 'company_id',
    ];
}
