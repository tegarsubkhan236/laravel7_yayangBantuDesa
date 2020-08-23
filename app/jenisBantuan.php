<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBantuan extends Model
{
    protected $dates = ['tgl_penyuluhan'];

    public function sasaran()
    {
        return $this->belongsTo('App\Sasaran');
    }
}
