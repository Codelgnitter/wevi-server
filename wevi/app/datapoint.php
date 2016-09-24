<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapoint extends Model
{
    protected $guarded = array(
        'id',
        'created_at',
        'updated_at'
    );
}
