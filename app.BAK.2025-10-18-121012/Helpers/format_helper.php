<?php
function formatDaySuffix($day)
{
    if (!in_array(($day % 100), [11, 12, 13])){
        switch ($day % 10) {
            case 1:  return $day.'st';
            case 2:  return $day.'nd';
            case 3:  return $day.'rd';
        }
    }
    return $day.'th';
}
