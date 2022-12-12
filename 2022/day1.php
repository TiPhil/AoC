<?php 

$handle = fopen("input/day1.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$sumData = [];
$currentSum = 0;

for ($i = 0; $i < count($data); $i++) {
    if (empty($data[$i])) {
        $sumData[] = $currentSum;

        $currentSum = 0;
        continue;
    }

    $currentSum += $data[$i];
}

sort($sumData);

$result = $sumData[count($sumData) - 1] + $sumData[count($sumData) - 2] + $sumData[count($sumData) - 3];

echo "Result: " . $result . "\n";