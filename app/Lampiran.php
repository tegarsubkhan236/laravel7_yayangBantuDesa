<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    public function jenisbantuan()
    {
        return $this->belongsTo(jenisBantuan::class);
    }
}
