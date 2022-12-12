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

$count = 0;

for ($i = 0; $i < $countY; $i++) {
    for ($j = 0; $j < $countX; $j++) {
        $valid = false;        

        // TOP
        $step = 1;

        if (isset($grid[$i - $step][$j])) {
            while ($grid[$i - $step][$j] < $grid[$i][$j]) {
                $step++;

                if (!isset($grid[$i - $step][$j])) {
                    $valid = true;
                    break;
                }
            }
        } else {
            $valid = true;
        }

        // BOTTOM
        $step = 1;

        if (isset($grid[$i + $step][$j])) {
            while ($grid[$i + $step][$j] < $grid[$i][$j]) {
                $step++;

                if (!isset($grid[$i + $step][$j])) {
                    $valid = true;
                    break;
                }
            }
        } else {
            $valid = true;
        }

        // LEFT
        $step = 1;

        if (isset($grid[$i][$j - $step])) {
            while ($grid[$i][$j - $step] < $grid[$i][$j]) {
                $step++;

                if (!isset($grid[$i][$j - $step])) {
                    $valid = true;
                    break;
                }
            }
        } else {
            $valid = true;
        }

        // RIGHT
        $step = 1;

        if (isset($grid[$i][$j + $step])) {
            while ($grid[$i][$j + $step] < $grid[$i][$j]) {
                $step++;

                if (!isset($grid[$i][$j + $step])) {
                    $valid = true;
                    break;
                }
            }
        } else {
            $valid = true;
        }

        if ($valid) {
            var_dump($i, $j);
            $count++;
        }
    }
}

echo "Score : " . $count . "\n";