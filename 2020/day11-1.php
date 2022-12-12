<?php 

$handle = fopen("input/day11.txt", "r");
$grid = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $grid[] = str_split(explode("\n", $line)[0]);
    }

    fclose($handle);
}

$countX = count($grid[0]);
$countY = count($grid);

$previousSeat = getSeat($grid);

while (1) {
    $cpGrid = $grid;

    for ($i = 0; $i < $countY; $i++) {
        for ($j = 0; $j < $countX; $j++) {
    
            $currentCount = 0;

            if (isset($grid[$i - 1][$j]) && $grid[$i - 1][$j] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i + 1][$j]) && $grid[$i + 1][$j] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i][$j - 1]) && $grid[$i][$j - 1] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i][$j + 1]) && $grid[$i][$j + 1] == '#') {
                $currentCount++;
            }
            
            if (isset($grid[$i - 1][$j - 1]) && $grid[$i - 1][$j - 1] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i + 1][$j + 1]) && $grid[$i + 1][$j + 1] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i - 1][$j + 1]) && $grid[$i - 1][$j + 1] == '#') {
                $currentCount++;
            }

            if (isset($grid[$i + 1][$j - 1]) && $grid[$i + 1][$j - 1] == '#') {
                $currentCount++;
            }

            if ($grid[$i][$j] == 'L') {
                if ($currentCount == 0) {
                    $cpGrid[$i][$j] = '#';
                }
            } else if ($grid[$i][$j] == '#') {
                if ($currentCount >= 4) {
                    $cpGrid[$i][$j] = 'L';
                }
            }
        }
    }

    $grid = $cpGrid;

    $currentSeat = getSeat($grid);

    if ($previousSeat == $currentSeat) {
        break;
    } else {
        $previousSeat = $currentSeat;
    }
}

echo "Result : " . $currentSeat . "\n";

function getSeat($grid) {
    $countX = count($grid[0]);
    $countY = count($grid);

    $count = 0;
    
    for ($i = 0; $i < $countY; $i++) {
        for ($j = 0; $j < $countX; $j++) { 
            if ($grid[$i][$j] == '#') {
                $count++;
            }
        }
    }

    return $count;
}