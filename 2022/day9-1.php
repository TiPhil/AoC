<?php 

$handle = fopen("input/day9.txt", "r");
$moves = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $moves[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$visited = [];
$visited[] = '0,0';

$tailX = 0;
$tailY = 0;

$headX = 0;
$headY = 0;

foreach ($moves as $move) {
    $tmp = explode(' ', $move);
    $direction = $tmp[0];
    $qte = $tmp[1];

    if ($direction == 'L') {

        for ($i = 0; $i < $qte; $i++) {
            $headX--;

            if (!isTailTouchingHead($headX, $headY, $tailX, $tailY)) {
                $tailX = $headX + 1;
                $tailY = $headY;

                $strPos = $tailX . ',' . $tailY;

                if (!in_array($strPos, $visited)) {
                    $visited[] = $strPos;
                }
            }
        }

    } else if ($direction == 'R') {

        for ($i = 0; $i < $qte; $i++) {
            $headX++;

            if (!isTailTouchingHead($headX, $headY, $tailX, $tailY)) {
                $tailX = $headX - 1;
                $tailY = $headY;

                $strPos = $tailX . ',' . $tailY;

                if (!in_array($strPos, $visited)) {
                    $visited[] = $strPos;
                }
            }
        }


    } else if ($direction == 'U') {

        for ($i = 0; $i < $qte; $i++) {
            $headY++;

            if (!isTailTouchingHead($headX, $headY, $tailX, $tailY)) {
                $tailX = $headX;
                $tailY = $headY - 1;

                $strPos = $tailX . ',' . $tailY;

                if (!in_array($strPos, $visited)) {
                    $visited[] = $strPos;
                }
            }
        }
        
    } else if ($direction == 'D') {
        
        for ($i = 0; $i < $qte; $i++) {
            $headY--;

            if (!isTailTouchingHead($headX, $headY, $tailX, $tailY)) {
                $tailX = $headX;
                $tailY = $headY + 1;

                $strPos = $tailX . ',' . $tailY;

                if (!in_array($strPos, $visited)) {
                    $visited[] = $strPos;
                }
            }
        }
    }
}

echo "Score : " . count($visited) . "\n";

function isTailTouchingHead($headX, $headY, $tailX, $tailY) {
    if ($headX == $tailX && $headY == $tailY) {
        return true;
    }

    if ($headX == $tailX - 1 && $headY == $tailY) {
        return true;
    }

    if ($headX == $tailX + 1 && $headY == $tailY) {
        return true;
    }

    if ($headX == $tailX && $headY == $tailY - 1) {
        return true;
    }

    if ($headX == $tailX && $headY == $tailY + 1) {
        return true;
    }

    if ($headX == $tailX - 1 && $headY == $tailY - 1) {
        return true;
    }

    if ($headX == $tailX + 1 && $headY == $tailY + 1) {
        return true;
    }

    if ($headX == $tailX - 1 && $headY == $tailY + 1) {
        return true;
    }

    if ($headX == $tailX + 1 && $headY == $tailY - 1) {
        return true;
    }
    
    return false;
}