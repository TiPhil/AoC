<?php 

$handle = fopen("input/day12.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}


$facing = 'E';
$horizontalWP = 10;
$verticalWP = 1;

$horizontalShip = 0;
$verticalShip = 0;

foreach ($data as $line) {
    $action = substr($line, 0, 1);
    $qte = substr($line, 1);

    if ($action == 'N') {
        $verticalWP += $qte;
    } else if ($action == 'S') {
        $verticalWP -= $qte;
    } else if ($action == 'E') {
        $horizontalWP += $qte;
    } else if ($action == 'W') {
        $horizontalWP -= $qte;
    } else if ($action == 'L') {
        if ($qte == 90) {
            if ($verticalWP > 0 && $horizontalWP > 0) {
                $facing = 'N';
            } else if ($facing == 'S') {
                $facing = 'E';
            } else if ($facing == 'W') {
                $facing = 'S';
            } else {
                $facing = 'W';
            }
        } else if ($qte == 180) {
            if ($facing == 'E') {
                $facing = 'W';
            } else if ($facing == 'S') {
                $facing = 'N';
            } else if ($facing == 'W') {
                $facing = 'E';
            } else {
                $facing = 'S';
            }
        } else if ($qte == 270) {
            if ($facing == 'E') {
                $facing = 'S';
            } else if ($facing == 'S') {
                $facing = 'W';
            } else if ($facing == 'W') {
                $facing = 'N';
            } else {
                $facing = 'E';
            }
        }
    } else if ($action == 'R') {
        if ($qte == 90) {
            if ($facing == 'E') {
                $facing = 'S';
            } else if ($facing == 'S') {
                $facing = 'W';
            } else if ($facing == 'W') {
                $facing = 'N';
            } else {
                $facing = 'E';
            }
        } else if ($qte == 180) {
            if ($facing == 'E') {
                $facing = 'W';
            } else if ($facing == 'S') {
                $facing = 'N';
            } else if ($facing == 'W') {
                $facing = 'E';
            } else {
                $facing = 'S';
            }
        } else if ($qte == 270) {
            if ($facing == 'E') {
                $facing = 'N';
            } else if ($facing == 'S') {
                $facing = 'E';
            } else if ($facing == 'W') {
                $facing = 'S';
            } else {
                $facing = 'W';
            }
        }
    } else if ($action == 'F') {
        $verticalShip += $qte * $verticalWP;
        $horizontalShip += $qte * $horizontalWP;
    }
}
var_dump($horizontal);
var_dump($vertical);


echo "Result : " . (abs($horizontal) + abs($vertical)) . "\n";

