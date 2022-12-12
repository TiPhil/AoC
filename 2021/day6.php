<?php 

$src = [
    2,1,1,1,1,1,1,5,1,1,1,1,5,1,1,3,5,1,1,3,1,1,3,1,4,4,4,5,1,1,1,3,1,3,1,1,2,2,1,1,1,5,1,1,1,5,2,5,1,1,2,1,3,3,5,1,1,4,1,1,3,1,1,1,1,1,1,1,1,1,1,1,1,4,1,5,1,2,1,1,1,1,5,1,1,1,1,1,5,1,1,1,4,5,1,1,3,4,1,1,1,3,5,1,1,1,2,1,1,4,1,4,1,2,1,1,2,1,5,1,1,1,5,1,2,2,1,1,1,5,1,2,3,1,1,1,5,3,2,1,1,3,1,1,3,1,3,1,1,1,5,1,1,1,1,1,1,1,3,1,1,1,1,3,1,1,4,1,1,3,2,1,2,1,1,2,2,1,2,1,1,1,4,1,2,4,1,1,4,4,1,1,1,1,1,4,1,1,1,2,1,1,2,1,5,1,1,1,1,1,5,1,3,1,1,2,3,4,4,1,1,1,3,2,4,4,1,1,3,5,1,1,1,1,4,1,1,1,1,1,5,3,1,5,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,5,1,1,1,1,1,1,1,1,5,1,4,4,1,1,1,1,1,1,1,1,3,1,3,1,4,1,1,2,2,2,1,1,2,1,1
];

$srcTest = [
    3,4,3,1,2
];

$init = array_fill(0, 9, 0);
$currentStates = array_count_values($src) + $init;

$day = 1;

do {
    $nextStates = [
        0 => $currentStates[1],
        1 => $currentStates[2],
        2 => $currentStates[3],
        3 => $currentStates[4],
        4 => $currentStates[5],
        5 => $currentStates[6],
        6 => $currentStates[7],
        7 => $currentStates[8],
        8 => $currentStates[0]
    ];

    $nextStates[6] += $currentStates[0];
    $currentStates = $nextStates;

    $day++;
} while ($day <= 256);

echo "Count: " . array_sum($currentStates) . "\n";