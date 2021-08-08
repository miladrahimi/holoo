<?php

use Carbon\Carbon;

function pdt(Carbon $datetime, $format = 'yyyy-MM-dd hh:mm:ss', $fixNumbers = true): string
{
    $formatter = new IntlDateFormatter(
        "fa_IR@calendar=persian",
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        'Asia/Tehran',
        IntlDateFormatter::TRADITIONAL,
        $format
    );

    $result = $formatter->format($datetime);

    return $fixNumbers ? fix_numbers($result) : $result;
}

function fix_numbers(string $string): string
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
    $num = range(0, 9);

    $convertedPersianNums = str_replace($persian, $num, $string);

    return str_replace($arabic, $num, $convertedPersianNums);
}


function fmt(int $n): string
{
    if ($n >= 1000000000) {
        return floatval($n / 1000000000) . 'BT';
    } elseif ($n >= 1000000) {
        return floatval($n / 1000000) . 'MT';
    } else {
        return floatval($n / 1000) . 'KT';
    }
}

function color(int $n): string
{
    if ($n > 0) {
        return 'success';
    } elseif ($n < 0) {
        return 'danger';
    } else {
        return 'warning';
    }
}
