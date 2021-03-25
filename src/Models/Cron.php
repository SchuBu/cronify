<?php

namespace Schubu\Cronify\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cron extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function cronable()
    {
        return $this->morphTo();
    }

}
