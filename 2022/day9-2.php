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

$knots = [
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
    [0, 0],
];

$counter = 1;

foreach ($moves as $move) {
    $tmp = explode(' ', $move);
    $direction = $tmp[0];
    $qte = $tmp[1];

    if ($direction == 'L') {

        for ($j = 0; $j < $qte; $j++) {
            $knots[0][0]--;

            for ($i = 0; $i < count($knots) - 1; $i++) {
                if (!isTailTouchingHead($knots[$i][0], $knots[$i][1], $knots[$i + 1][0], $knots[$i + 1][1])) {
                    $offsetX = $knots[$i][0] - $knots[$i + 1][0];
                    $offsetY = $knots[$i][1] - $knots[$i + 1][1];

                    if ($offsetX > 0) {
                        $offsetX = 1;
                    } else if ($offsetX < 0) {
                        $offsetX = -1;
                    }

                    if ($offsetY > 0) {
                        $offsetY = 1;
                    } else if ($offsetY < 0) {
                        $offsetY = -1;
                    }
                    
                    $knots[$i + 1][0] += $offsetX;
                    $knots[$i + 1][1] += $offsetY;
                    
                    if ($i == count($knots) - 2) {
                        verifyVisited($visited, $knots[$i + 1][0], $knots[$i + 1][1]);
                    }
                }
            }
        }

    } else if ($direction == 'R') {

        for ($j = 0; $j < $qte; $j++) {
            $knots[0][0]++;

            for ($i = 0; $i < count($knots) - 1; $i++) {
                if (!isTailTouchingHead($knots[$i][0], $knots[$i][1], $knots[$i + 1][0], $knots[$i + 1][1])) {
                    $offsetX = $knots[$i][0] - $knots[$i + 1][0];
                    $offsetY = $knots[$i][1] - $knots[$i + 1][1];

                    if ($offsetX > 0) {
                        $offsetX = 1;
                    } else if ($offsetX < 0) {
                        $offsetX = -1;
                    }

                    if ($offsetY > 0) {
                        $offsetY = 1;
                    } else if ($offsetY < 0) {
                        $offsetY = -1;
                    }
                    
                    $knots[$i + 1][0] += $offsetX;
                    $knots[$i + 1][1] += $offsetY;
                    
                    if ($i == count($knots) - 2) {
                        verifyVisited($visited, $knots[$i + 1][0], $knots[$i + 1][1]);
                    }
                }
            }
        }

    } else if ($direction == 'U') {

        for ($j = 0; $j < $qte; $j++) {
            $knots[0][1]++;

            for ($i = 0; $i < count($knots) - 1; $i++) {
                if (!isTailTouchingHead($knots[$i][0], $knots[$i][1], $knots[$i + 1][0], $knots[$i + 1][1])) {
                    $offsetX = $knots[$i][0] - $knots[$i + 1][0];
                    $offsetY = $knots[$i][1] - $knots[$i + 1][1];

                    if ($offsetX > 0) {
                        $offsetX = 1;
                    } else if ($offsetX < 0) {
                        $offsetX = -1;
                    }

                    if ($offsetY > 0) {
                        $offsetY = 1;
                    } else if ($offsetY < 0) {
                        $offsetY = -1;
                    }
                    
                    $knots[$i + 1][0] += $offsetX;
                    $knots[$i + 1][1] += $offsetY;
                    
                    if ($i == count($knots) - 2) {
                        verifyVisited($visited, $knots[$i + 1][0], $knots[$i + 1][1]);
                    }
                }
            }
        }
        
    } else if ($direction == 'D') {
        
        for ($j = 0; $j < $qte; $j++) {
            $knots[0][1]--;

            for ($i = 0; $i < count($knots) - 1; $i++) {
                if (!isTailTouchingHead($knots[$i][0], $knots[$i][1], $knots[$i + 1][0], $knots[$i + 1][1])) {
                    $offsetX = $knots[$i][0] - $knots[$i + 1][0];
                    $offsetY = $knots[$i][1] - $knots[$i + 1][1];

                    if ($offsetX > 0) {
                        $offsetX = 1;
                    } else if ($offsetX < 0) {
                        $offsetX = -1;
                    }

                    if ($offsetY > 0) {
                        $offsetY = 1;
                    } else if ($offsetY < 0) {
                        $offsetY = -1;
                    }
                    
                    $knots[$i + 1][0] += $offsetX;
                    $knots[$i + 1][1] += $offsetY;
                    
                    if ($i == count($knots) - 2) {
                        verifyVisited($visited, $knots[$i + 1][0], $knots[$i + 1][1]);
                    }
                }
            }
        }
    }

    foreach ($knots as $knot) {
        echo $knot[0] . " - " . $knot[1] . "\n";
    }

    var_dump('-----');
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

function verifyVisited(&$visited, $x, $y) {
    $strPos = $x . ',' . $y;
    
    if (!in_array($strPos, $visited)) {                           
        $visited[] = $strPos;
    }
}