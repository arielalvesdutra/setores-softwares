<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
      'name'
    ];

    public function softwares()
    {
        return $this->belongsToMany(
            'App\Software',
            'sectors_softwares',
            'sector_id',
            'software_id'
        );
    }
}
