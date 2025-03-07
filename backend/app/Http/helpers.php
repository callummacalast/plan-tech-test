<?php

function convertDurationToSeconds(?string $duration): float|int
{
    if (empty($duration)) {
        return 0;
    }

    list($minutes, $seconds) = explode(":", $duration);
    return ($minutes * 60) + $seconds;
}
