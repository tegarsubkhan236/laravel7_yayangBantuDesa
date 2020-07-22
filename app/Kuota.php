<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    public function jenisbantuan()
    {
        return $this->belongsTo('App\jenisBantuan', 'jenisbantuan_id');
    }
    public function penyuluhan()
    {
        return $this->belongsTo(Penyuluhan::class);
    }
}
