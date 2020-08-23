<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
}
