<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }

    public function jenisbantuan()
    {
        return $this->belongsTo('App\JenisBantuan');
    }
    // public function sasaran()
    // {
    //     return $this->belongsTo('App\Sasaran');
    // }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
