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

            if (isset($grid[$i - 1][$j])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i - $currentStep][$j])) {
                        break;
                    }

                    if ($grid[$i - $currentStep][$j] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i - $currentStep][$j] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i + 1][$j])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i + $currentStep][$j])) {
                        break;
                    }

                    if ($grid[$i + $currentStep][$j] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i + $currentStep][$j] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i][$j - 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i][$j - $currentStep])) {
                        break;
                    }

                    if ($grid[$i][$j - $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i][$j - $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i][$j + 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i][$j + $currentStep])) {
                        break;
                    }

                    if ($grid[$i][$j + $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i][$j + $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i - 1][$j + 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i - $currentStep][$j + $currentStep])) {
                        break;
                    }

                    if ($grid[$i - $currentStep][$j + $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i - $currentStep][$j + $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i + 1][$j - 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i + $currentStep][$j - $currentStep])) {
                        break;
                    }

                    if ($grid[$i + $currentStep][$j - $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i + $currentStep][$j - $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i - 1][$j - 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i - $currentStep][$j - $currentStep])) {
                        break;
                    }

                    if ($grid[$i - $currentStep][$j - $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i - $currentStep][$j - $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if (isset($grid[$i + 1][$j + 1])) {
                $currentStep = 1;

                while (1) {
                    if (!isset($grid[$i + $currentStep][$j + $currentStep])) {
                        break;
                    }

                    if ($grid[$i + $currentStep][$j + $currentStep] == '#') {
                        $currentCount++;
                        break;
                    } else if ($grid[$i + $currentStep][$j + $currentStep] == 'L') {
                        break;
                    } else {
                        $currentStep++;
                    }
                }
            }

            if ($grid[$i][$j] == 'L') {
                if ($currentCount == 0) {
                    $cpGrid[$i][$j] = '#';
                }
            } else if ($grid[$i][$j] == '#') {
                if ($currentCount >= 5) {
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