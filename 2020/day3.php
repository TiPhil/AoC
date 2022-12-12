<?php 

$handle = fopen("input/day2.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$grid = [];

foreach ($data as $d) {
    $grid[] = str_split($d);
}

$countX = count($grid[0]);
$countY = count($grid);

$currentX = 1;
$currentY = 2;

$tree = 0;

do {
    if ($grid[$currentY][$currentX] == '#') {
        $tree++;
    }

    $currentX += 1;
    $currentY += 2;

    if ($currentX >= $countX) {
        $currentX -= $countX;
    }

} while ($currentY < $countY);

echo "Result: " . $tree . "\n";