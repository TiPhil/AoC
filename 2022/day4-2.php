<?php 

$handle = fopen("input/day4.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$score = 0;

foreach ($data as $line) {
    $parts = explode(',', $line);
    $range1 = explode('-', $parts[0]);
    $range2 = explode('-', $parts[1]);

    if (($range1[0] >= $range2[0] && $range1[0] <= $range2[1]) || ($range2[0] >= $range1[0] && $range2[0] <= $range1[1])) {
        $score++;
    }
}

echo "Score : " . $score . "\n";