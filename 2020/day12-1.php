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
$horizontal = 0;
$vertical = 0;

foreach ($data as $line) {
    $action = substr($line, 0, 1);
    $qte = substr($line, 1);

    if ($action == 'N') {
        $vertical += $qte;
    } else if ($action == 'S') {
        $vertical -= $qte;
    } else if ($action == 'E') {
        $horizontal += $qte;
    } else if ($action == 'W') {
        $horizontal -= $qte;
    } else if ($action == 'L') {
        if ($qte == 90) {
            if ($facing == 'E') {
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
        if ($facing == 'E') {
            $horizontal += $qte;
        } else if ($facing == 'S') {
            $vertical -= $qte;
        } else if ($facing == 'W') {
            $horizontal -= $qte;
        } else {
            $vertical += $qte;
        }
    }
}
var_dump($horizontal);
var_dump($vertical);


echo "Result : " . (abs($horizontal) + abs($vertical)) . "\n";

