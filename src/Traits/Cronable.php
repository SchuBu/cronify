<?php


namespace Schubu\Cronify\Traits;

use Cron\CronExpression;
use Schubu\Cronify\Models\Cron;

trait Cronable
{
    public function crons()
    {
        return $this->morphMany(Cron::class,'cronable');
    }

    public function isDue($currentTime = 'now')
    {
        foreach($this->crons as $cron) {
            if((new CronExpression($cron->pattern))->isDue($currentTime)) {
                return true;
            }
        }

        return false;
    }
}
