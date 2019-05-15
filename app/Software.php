<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{

    protected $table = "softwares";

    protected $fillable = [
        'name'
    ];

    public function sectors()
    {
        return $this->belongsToMany(
            'App\Sector',
            'sectors_softwares',
            'software_id',
            'sector_id'
        );
    }
}
