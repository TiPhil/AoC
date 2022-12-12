<?php 

$handle = fopen("input/day5.txt", "r");
$data = [];

$isMoveLines = false;
$moves = [];
$grid = [];
$stack = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $tmp = explode("\n", $line)[0];

        if (empty($tmp)) {
            $isMoveLines = true;
            continue;
        }

        if ($isMoveLines) {
            $moves[] = $tmp;
        } else {
            $grid[] = $tmp;
        }
    }

    fclose($handle);
}

$grid = array_reverse($grid);
unset($grid[0]);

foreach ($grid as $item) {
    $tmp = explode(' ', $item);

    $currentIndex = 0;

    for ($i = 0; $i < count($tmp); $i++) {
        if (!empty($tmp[$i])) {
            if (!isset($stack[$currentIndex])) {
                $stack[$currentIndex] = [];
            }

            $stack[$currentIndex][] = $tmp[$i][1];
            
        } else {
            $i += 3;
        }

        $currentIndex++;
    }
}

foreach ($moves as $move) {
    $tmp = explode(' from ', $move);
    $qte = explode('move ', $tmp[0])[1];

    $tmp2 = explode(' to ', $tmp[1]);
    $from = $tmp2[0] - 1;
    $to = $tmp2[1] - 1;

    $crane = [];

    for ($i = 1; $i <= $qte; $i++) {
        $crane[] = array_pop($stack[$from]);
    }

    $stack[$to] = array_merge($stack[$to], array_reverse($crane));
}

$result = '';

foreach ($stack as $item) {
    $result .= array_pop($item);
}

echo "Score : " . $result . "\n";