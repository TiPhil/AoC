<?php 

$handle = fopen("input/day8.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode(".\n", $line)[0];
    }

    fclose($handle);
}

$patternOrg = [];
$jmpOrNopIndex = [];
$index = 0;

foreach ($data as $d) {
    $tmp = explode(' ', $d);
    
    $patternOrg[] = [
        'type' => $tmp[0],
        'val' => (int)$tmp[1],
        'visited' => false
    ];

    if ($tmp[0] == 'jmp' || $tmp[0] == 'nop') {
        $jmpOrNopIndex[] = $index;
    }

    $index++;
}

$jmpOrNopIndex[] = 7;
$leave = false;

foreach ($jmpOrNopIndex as $item) {
    $pattern = $patternOrg;
    
    $accumulator = 0;
    $index = 0;

    if ($pattern[$item]['type'] == 'jmp') {
        $pattern[$item]['type'] = 'nop';
    } else {
        $pattern[$item]['type'] = 'jmp';
    }

    for ($i = 0; $i < count($pattern); $i++) {
        $pattern[$i]['visited'] = false;
    }

    while (1) {
        if ($index == count($pattern)) {
            $leave = true;
            break;
        }

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

    if ($leave) {
        break;
    }
}

echo "Result: " . $accumulator . "\n";

