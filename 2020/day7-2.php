<?php 

$handle = fopen("input/day7.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode(".\n", $line)[0];
    }

    fclose($handle);
}

$count = 0;

$rules = [];

foreach ($data as $d) {
    $tmp = explode(' contain ', $d);
    
    $rules[$tmp[0]] = $tmp[1];
}

$bags = getNbBags($rules, 'shiny gold bags');

function getNbBags($rules, $key) {

    var_dump($rules[$key]);

    if (!isset($rules[$key]) || $rules[$key] == 'no other bags') {
        return 0;
    }

    $contains = [];

    if (str_contains($rules[$key], ', ')) {
        $contains = explode(', ', $rules[$key]);
    } else {
        $contains = [$rules[$key]];
    }

    $count = 0;

    foreach ($contains as $item) {
        $currentQte = substr($item, 0, 1);
        $bagType = substr($item, 2);

        if (substr($bagType, -1) != 's') {
            $bagType .= 's';
        }

        var_dump($currentQte);

        $count += $currentQte + ($currentQte * getNbBags($rules, $bagType));
    }

    return $count;
}



echo "Result: " . $bags . "\n";