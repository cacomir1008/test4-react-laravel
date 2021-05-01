<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Condition extends Model
{
    protected $fillable = [
        'start', 'diagnosis', 'hospital', 'comment', 'icon','conditionsdata_id','user_id'
    ];
}
