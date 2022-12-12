<?php 

$src = [
    '2478668324',
    '4283474125',
    '1663463374',
    '1738271323',
    '4285744861',
    '3551311515',
    '8574335438',
    '7843525826',
    '1366237577',
    '3554687226',
];

$srcTest = [
    '5483143223',
    '2745854711',
    '5264556173',
    '6141336146',
    '6357385478',
    '4167524645',
    '2176841721',
    '6882881134',
    '4846848554',
    '5283751526',
];

$total = 0;
$i = 0;

$target = $src; // $src OR $srcTest

$grid = [];
$flashes = 0;
$result = 0;

foreach ($target as $item) {
    $grid[] = str_split($item);
}

for ($step = 0; $step < 1000; $step++) {
    increaseAll($grid);
    $flashes = 0;

    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            if ($grid[$i][$j] > 9) {
                $grid[$i][$j] = 0;

                verifyAdjacent($grid, $i, $j);
            }
        }
    }

    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            if ($grid[$i][$j] == 0) {
                $flashes++;
            }
        }
    }

    if ($flashes == (count($grid) * count($grid[0]))) {
        $result = $step + 1;
        break;
    }
}

echo "Total: " . $result . "\n";

function increaseAll(&$grid) {
    for ($i = 0; $i < count($grid); $i++) {
        for ($j = 0; $j < count($grid[$i]); $j++) {
            $grid[$i][$j]++;
        }
    }
}

function verifyAdjacent(&$grid, $i, $j) {
    
    if (isset($grid[$i + 1][$j]) && $grid[$i + 1][$j] > 0) {
        $grid[$i + 1][$j]++;

        if ($grid[$i + 1][$j] > 9) {
            $grid[$i + 1][$j] = 0;
    
            verifyAdjacent($grid, $i + 1, $j);
        }
    }

    if (isset($grid[$i - 1][$j]) && $grid[$i - 1][$j] > 0) {
        $grid[$i - 1][$j]++;

        if ($grid[$i - 1][$j] > 9) {
            $grid[$i - 1][$j] = 0;
    
            verifyAdjacent($grid, $i - 1, $j);
        }
    }

    if (isset($grid[$i][$j + 1]) && $grid[$i][$j + 1] > 0) {
        $grid[$i][$j + 1]++;

        if ($grid[$i][$j + 1] > 9) {
            $grid[$i][$j + 1] = 0;
    
            verifyAdjacent($grid, $i, $j + 1);
        }
    }

    if (isset($grid[$i][$j - 1]) && $grid[$i][$j - 1] > 0) {
        $grid[$i][$j - 1]++;

        if ($grid[$i][$j - 1] > 9) {
            $grid[$i][$j - 1] = 0;
    
            verifyAdjacent($grid, $i, $j - 1);
        }
    }

    if (isset($grid[$i + 1][$j + 1]) && $grid[$i + 1][$j + 1] > 0) {
        $grid[$i + 1][$j + 1]++;

        if ($grid[$i + 1][$j + 1] > 9) {
            $grid[$i + 1][$j + 1] = 0;
    
            verifyAdjacent($grid, $i + 1, $j + 1);
        }
    }

    if (isset($grid[$i + 1][$j - 1]) && $grid[$i + 1][$j - 1] > 0) {
        $grid[$i + 1][$j - 1]++;

        if ($grid[$i + 1][$j - 1] > 9) {
            $grid[$i + 1][$j - 1] = 0;
    
            verifyAdjacent($grid, $i + 1, $j - 1);
        }
    }

    if (isset($grid[$i - 1][$j + 1]) && $grid[$i - 1][$j + 1] > 0) {
        $grid[$i - 1][$j + 1]++;

        if ($grid[$i - 1][$j + 1] > 9) {
            $grid[$i - 1][$j + 1] = 0;
    
            verifyAdjacent($grid, $i - 1, $j + 1);
        }
    }

    if (isset($grid[$i - 1][$j - 1]) && $grid[$i - 1][$j - 1] > 0) {
        $grid[$i - 1][$j - 1]++;

        if ($grid[$i - 1][$j - 1] > 9) {
            $grid[$i - 1][$j - 1] = 0;
    
            verifyAdjacent($grid, $i - 1, $j - 1);
        }
    }
}