<?php

use Carbon\Carbon;

/**
 * retorna date formatado.
 * @param  string $date a ser formatado
 * @param string $date_format novo formato date
 * @return date
 */
function changeDateFormate($date, $date_format)
{
    $date = preg_replace('/[^0-9]/', '-', $date);
    return Carbon::make($date)->format($date_format);
}
