<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=[
        'director_id','company_id','name','file_path','flag'
    ];
}
