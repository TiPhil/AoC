<?php 

$handle = fopen("input/day7.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$count = 0;

$rules = [];

$matchedbags = ['shiny gold'];

foreach ($data as $d) {
    $tmp = explode(' contain ', $d);
    
    $rules[$tmp[0]] = $tmp[1];
}

$iteration = 0;

while (1) {

    $added = [];

    foreach ($rules as $key => $rule) {
        foreach ($matchedbags as $bag) {
            $singularKey = substr($key, 0, -1);

            if (str_contains($rule, $bag) && !in_array($singularKey, $matchedbags)) {
                $matchedbags[] = $singularKey;
                $added[] = $singularKey;
            }
        }
    }

    if (empty($added)) {
        break;
    }

    $iteration++;
} 

var_dump($matchedbags);

echo "Result: " . count($matchedbags) . "\n";