<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $fillable=[
        'company_id','nic','passport','landline','mobile','email','title',
        'full_name','occupation','ds_division','gs_division','postal_code',
        'residential_address','foreign_address','no_of_shares','norminal_value','flag',
    ];
}
