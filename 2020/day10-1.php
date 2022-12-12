<?php 

$handle = fopen("input/day10.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

sort($data);

$highest = $data[count($data) - 1] + 3;

$current = 0;

$data[] = $highest;

$step1 = $step2 = $step3 = 0;

do {
    if (in_array($current + 1, $data)) {
        $current += 1;
        $step1++;

    } else if (in_array($current + 2, $data)) {
        $current += 2;
        $step2++;

    } else if (in_array($current + 3, $data)) {
        $current += 3;
        $step3++;
        
    }

} while ($current != $highest);

echo "Result : " . ($step1 * $step3) . "\n";