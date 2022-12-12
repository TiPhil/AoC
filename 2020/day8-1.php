<?php 

$handle = fopen("input/day8.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode(".\n", $line)[0];
    }

    fclose($handle);
}

$pattern = [];

foreach ($data as $d) {
    $tmp = explode(' ', $d);
    
    $pattern[] = [
        'type' => $tmp[0],
        'val' => (int)$tmp[1],
        'visited' => false
    ];
}

$index = 0;
$accumulator = 0;

while (1) {
    if ($pattern[$index]['visited']) {
        break;
    }

    $pattern[$index]['visited'] = true;

    if ($pattern[$index]['type'] == 'acc') {
        $accumulator += $pattern[$index]['val'];
        $index++;
    } else if ($pattern[$index]['type'] == 'jmp') {
        $index += $pattern[$index]['val'];
    } else if ($pattern[$index]['type'] == 'nop') {
        $index++;
    }
}

echo "Result: " . $accumulator . "\n";

