<?php 

$handle = fopen("input/day2.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$score = 0;

foreach ($data as $item) {
    $elfPlay = $item[0]; // A = Roche, B = Papier, C = Ciseau 
    $myPlay = $item[2]; // X = Roche, Y = Papier, Z = Ciseau 

    if ($elfPlay == 'A' && $myPlay == 'X') {
        $score += 3; // Tie
    } else if ($elfPlay == 'B' && $myPlay == 'Y') {
        $score += 3; // Tie
    } else if ($elfPlay == 'C' && $myPlay == 'Z') {
        $score += 3; // Tie
    } else if ($myPlay == 'X' && $elfPlay == 'C') {
        $score += 6; // Win
    } else if ($myPlay == 'Z' && $elfPlay == 'B') {
        $score += 6; // Win
    } else if ($myPlay == 'Y' && $elfPlay == 'A') {
        $score += 6; // Win
    }

    if ($myPlay == 'X') {
        $score += 1;
    } else if ($myPlay == 'Y') {
        $score += 2;
    } else if ($myPlay == 'Z') {
        $score += 3;
    }
}

echo "Score : " . $score . "\n";