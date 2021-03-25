<?php

namespace Schubu\Cronify\Models;

use Database\Factories\CronFactory;
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

    protected static function newFactory()
    {
        return CronFactory::new();
    }

}
