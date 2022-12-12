<?php 

$handle = fopen("input/day9.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$target = 1212510616;
$leave = false;

for ($i = 0; $i < count($data); $i++) {

    $currentSum = 0;
    $continuous = [];

    for ($j = $i; $j < count($data); $j++) {
        $currentSum += $data[$j];
        $continuous[] = $data[$j];

        if ($currentSum == $target) {
            $leave = true;
            break;
        } else if ($currentSum > $target) {
            break;
        }
    }

    if ($leave) {
        break;
    }
}

sort($continuous);

echo "Result : " . ($continuous[0] + $continuous[count($continuous) - 1]) . "\n";