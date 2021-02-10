<?php

namespace Schubu\Cronify\Models;

use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function cronable()
    {
        return $this->morphTo();
    }

}
