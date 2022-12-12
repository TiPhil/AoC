<?php 

$handle = fopen("input/day6.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $tmp = explode("\n", $line)[0];

        $data = str_split($tmp);
    }

    fclose($handle);
}

$result = 0;

for ($i = 3; $i < count($data); $i++) {
    $current = [
        $data[$i],
        $data[$i - 1],
        $data[$i - 2],
        $data[$i - 3]
    ];

    if (count($current) == count(array_unique($current))) {
        $result = $i + 1;
        break;
    }
}

echo "Score : " . $result . "\n";