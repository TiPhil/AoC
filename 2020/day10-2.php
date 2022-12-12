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
$data[] = $highest;

$cache = [];

$result = getCombinations(0, $data, $highest, $cache);

echo "Result : " . $result . "\n";

function getCombinations($current, $data, $highest, &$cache) {
   
    if ($current == $highest) {
        return 1;
    }

    $currentCount = 0;

    for ($i = 1; $i <= 3; $i++) {
        if (in_array($current + $i, $data)) {
            $remains = getHigherValues($data, $current + $i);

            if (!isset($cache[$current + $i])) {
                $cache[$current + $i] = getCombinations($current + $i, $remains, $highest, $cache);
            }

            $currentCount += $cache[$current + $i];
        }
    }

    return $currentCount;
}

function getHigherValues($data, $higherThan) {
    $returns = [];

    foreach ($data as $d) {
        if ($d > $higherThan) {
            $returns[] = $d;
        }
    }

    return $returns;
}