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

$offset = 25;
$wrong = 0;

for ($i = $offset; $i < count($data); $i++) {

    $nbr = $data[$i];
    $result = verifySum($data, $nbr, $i - $offset, $i);

    if (!$result) {
        $wrong = $nbr;
    }
}

echo "Result : " . $wrong . "\n";

function verifySum($data, $nbr, $offset, $current) {
    $match = 0;

    for ($i = $offset; $i < $current; $i++) {
        for ($j = $offset; $j < $current; $j++) {
            if ($data[$i] != $data[$j] && ($data[$i] + $data[$j]) == $nbr) {
                $match++;
            }
        }
    }

    return $match > 0;
}