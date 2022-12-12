<?php 

$handle = fopen("input/day5.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$grid = [];

$min = 0;
$max = 127;

$seats = [];

foreach ($data as $d) {
    $lane = substr($d, 0, 7);
    $seat = substr($d, -3);

    $min = 0;
    $max = 127;

    foreach (str_split($lane) as $char) {
        if ($char == 'F') {
            $max = floor(($min + $max) / 2);
        } else {
            $min = ceil(($min + $max) / 2);
        }
    }

    $laneId = $min * 8;

    $min = 0;
    $max = 7;

    foreach (str_split($seat) as $char) {
        if ($char == 'L') {
            $max = floor(($min + $max) / 2);
        } else {
            $min = ceil(($min + $max) / 2);
        }
    }

    $seats[] = $laneId + $min;
}

sort($seats);

$diff = array_values(array_diff(range(91, 928), $seats));

echo "Result : " . $diff[0] . "\n";
