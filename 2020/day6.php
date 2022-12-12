<?php 

$handle = fopen("input/day6.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$count = 0;

$same = [];
$createNew = true;

$groups = 0;

foreach ($data as $item) {
    if (empty($item)) {
        $count += count($same);
        $createNew = true;
        
        continue;
    }
    
    if ($createNew) {
        $same = str_split($item);
        $createNew = false;
    } else {
        $same = array_intersect($same, str_split($item));
    }
}

$count += count($same);

//die();

echo "Result: " . $count . "\n";