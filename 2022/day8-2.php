<?php 

$handle = fopen("input/day8.txt", "r");
$grid = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $grid[] = str_split(explode("\n", $line)[0]);
    }

    fclose($handle);
}

$countX = count($grid[0]);
$countY = count($grid);

$highest = 0;

for ($i = 0; $i < $countY; $i++) {
    for ($j = 0; $j < $countX; $j++) {

        // TOP
        $stepTop = 0;
        $tmp = 1;

        while (isset($grid[$i - $tmp][$j])) {
            $stepTop++;

            if ($grid[$i - $tmp][$j] >= $grid[$i][$j]) {
                break;
            } else {
                $tmp++;
            }
        }

        // BOTTOM
        $stepBottom = 0;
        $tmp = 1;

        while (isset($grid[$i + $tmp][$j])) {
            $stepBottom++;

            if ($grid[$i + $tmp][$j] >= $grid[$i][$j]) {
                break;
            } else {
                $tmp++;
            }
        }

        // LEFT
        $stepLeft = 0;
        $tmp = 1;

        while (isset($grid[$i][$j - $tmp])) {
            $stepLeft++;

            if ($grid[$i][$j - $tmp] >= $grid[$i][$j]) {
                break;
            } else {
                $tmp++;
            }
        }

        // RIGHT
        $stepRight = 0;
        $tmp = 1;

        while (isset($grid[$i][$j + $tmp])) {
            $stepRight++;

            if ($grid[$i][$j + $tmp] >= $grid[$i][$j]) {
                break;
            } else {
                $tmp++;
            }
        }

        $currentResult = $stepBottom * $stepLeft * $stepTop * $stepRight;

        if ($currentResult > $highest) {
            $highest = $currentResult;
        }
    }
}

echo "Score : " . $highest . "\n";