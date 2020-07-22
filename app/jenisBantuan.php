<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBantuan extends Model
{
    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran');
    }
}
