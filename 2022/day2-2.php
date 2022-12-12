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
    $decision = $item[2]; // X = Lose, Y = Tie, Z = Win 

    if ($decision == 'X') {
        if ($elfPlay == 'A') {
            $myPlay = 'Z';
        } else if ($elfPlay == 'B') {
            $myPlay = 'X';
        } else if ($elfPlay == 'C') {
            $myPlay = 'Y';
        }
    }

    if ($decision == 'Y') {
        if ($elfPlay == 'A') {
            $myPlay = 'X';
        } else if ($elfPlay == 'B') {
            $myPlay = 'Y';
        } else if ($elfPlay == 'C') {
            $myPlay = 'Z';
        }

        $score += 3;
    }

    if ($decision == 'Z') {
        if ($elfPlay == 'A') {
            $myPlay = 'Y';
        } else if ($elfPlay == 'B') {
            $myPlay = 'Z';
        } else if ($elfPlay == 'C') {
            $myPlay = 'X';
        }

        $score += 6;
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