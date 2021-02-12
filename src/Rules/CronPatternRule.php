<?php

namespace Schubu\Cronify\Rules;

use Cron\CronExpression;
use Illuminate\Contracts\Validation\Rule;

class CronPatternRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $keys = array_flip(["minute","hour","day","month","weekday"]);
        if((is_array($value) && count($value) == 5 && array_diff_key($keys,$value) === []) !== true) return false;
        if(in_array(null, $value, true) || in_array('', $value, true)) return false;
        return CronExpression::isValidExpression($value['minute']." ".$value['hour']." ".$value['day']." ".$value['month']." ".$value['weekday']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute pattern is invalid';
    }
}
