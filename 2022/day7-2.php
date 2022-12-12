<?php 

$handle = fopen("input/day7.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$path = [];
$sizes = [];

$totalSize = 70000000;
$needSize = 30000000;
$result = 0;

foreach ($data as $item) {
    $tmp = explode(' ', $item);

    if ($tmp[0] == '$') {
        if ($tmp[1] == 'cd') {
            if ($tmp[2] == '..') {
                array_pop($path);
            } else if ($tmp[2] == '/') {
                $path = ['/'];
            } else {
                $path[] = $tmp[2];
            }
        }
    } else {
        if ($tmp[0] != 'dir') {
            for ($i = 0; $i < count($path); $i++) {
                $folder = implode(',', array_slice($path, 0, $i + 1));

                if (!isset($sizes[$folder])) {
                    $sizes[$folder] = $tmp[0];
                } else {
                    $sizes[$folder] += $tmp[0];
                }
            }
        }
    }
}

$currentAvailableSize = $totalSize - $sizes['/'];
$deleteSize = $needSize - $currentAvailableSize;

sort($sizes);

foreach ($sizes as $item) {
    if ($item >= $deleteSize) {
        $result = $item;
        break;
    }
}

echo "Score : " . $result . "\n";