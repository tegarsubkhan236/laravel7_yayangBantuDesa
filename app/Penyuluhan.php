<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    public function bantuan()
    {
        return $this->belongsTo('App\Bantuan')->where('status', 'Diterima');
    }

    public function jenisbantuan()
    {
        return $this->belongsTo(jenisBantuan::class);
    }
}
