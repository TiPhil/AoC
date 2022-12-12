<?php 

$srcProd = 'ONHOOSCKBSVHBNKFKSBK';
$srcTest = 'NNCB';

$rulesProd = [
    ['H', 'O', 'B'],
    ['K', 'B', 'O'],
    ['P', 'V', 'B'],
    ['B', 'V', 'C'],
    ['H', 'K', 'N'],
    ['F', 'K', 'H'],
    ['N', 'V', 'C'],
    ['P', 'F', 'K'],
    ['F', 'V', 'B'],
    ['N', 'H', 'P'],
    ['C', 'O', 'N'],
    ['H', 'V', 'P'],
    ['O', 'H', 'H'],
    ['B', 'C', 'H'],
    ['S', 'P', 'C'],
    ['O', 'K', 'F'],
    ['K', 'H', 'N'],
    ['H', 'B', 'V'],
    ['F', 'P', 'N'],
    ['K', 'P', 'O'],
    ['F', 'B', 'O'],
    ['F', 'H', 'F'],
    ['C', 'N', 'K'],
    ['B', 'P', 'P'],
    ['S', 'F', 'O'],
    ['C', 'K', 'K'],
    ['K', 'N', 'O'],
    ['V', 'K', 'C'],
    ['H', 'P', 'N'],
    ['K', 'K', 'V'],
    ['K', 'O', 'C'],
    ['O', 'O', 'P'],
    ['B', 'H', 'B'],
    ['O', 'C', 'O'],
    ['H', 'C', 'V'],
    ['H', 'S', 'O'],
    ['S', 'H', 'V'],
    ['S', 'O', 'C'],
    ['F', 'S', 'N'],
    ['C', 'H', 'O'],
    ['P', 'C', 'O'],
    ['F', 'C', 'S'],
    ['V', 'O', 'H'],
    ['N', 'S', 'H'],
    ['P', 'H', 'C'],
    ['S', 'S', 'F'],
    ['B', 'N', 'B'],
    ['B', 'F', 'F'],
    ['N', 'C', 'F'],
    ['C', 'S', 'F'],
    ['N', 'N', 'O'],
    ['F', 'F', 'P'],
    ['O', 'F', 'H'],
    ['N', 'F', 'O'],
    ['S', 'C', 'F'],
    ['K', 'C', 'F'],
    ['C', 'P', 'H'],
    ['C', 'F', 'K'],
    ['B', 'S', 'S'],
    ['H', 'N', 'K'],
    ['C', 'B', 'P'],
    ['P', 'B', 'V'],
    ['V', 'P', 'C'],
    ['O', 'S', 'C'],
    ['F', 'N', 'B'],
    ['N', 'B', 'V'],
    ['B', 'B', 'C'],
    ['B', 'K', 'V'],
    ['V', 'F', 'V'],
    ['V', 'C', 'O'],
    ['N', 'O', 'K'],
    ['K', 'F', 'P'],
    ['F', 'O', 'C'],
    ['O', 'B', 'K'],
    ['O', 'N', 'S'],
    ['B', 'O', 'V'],
    ['K', 'V', 'H'],
    ['C', 'C', 'O'],
    ['H', 'F', 'N'],
    ['V', 'S', 'S'],
    ['P', 'N', 'P'],
    ['S', 'K', 'F'],
    ['P', 'O', 'V'],
    ['H', 'H', 'F'],
    ['V', 'V', 'N'],
    ['V', 'H', 'N'],
    ['S', 'V', 'S'],
    ['C', 'V', 'B'],
    ['K', 'S', 'K'],
    ['P', 'S', 'V'],
    ['O', 'V', 'S'],
    ['S', 'B', 'V'],
    ['N', 'P', 'K'],
    ['S', 'N', 'C'],
    ['N', 'K', 'O'],
    ['P', 'K', 'F'],
    ['V', 'N', 'P'],
    ['P', 'P', 'K'],
    ['V', 'B', 'C'],
    ['O', 'P', 'P'],
];

$rulesTest = [
    ['C', 'H', 'B'],
    ['H', 'H', 'N'],
    ['C', 'B', 'H'],
    ['N', 'H', 'C'],
    ['H', 'B', 'C'],
    ['H', 'C', 'B'],
    ['H', 'N', 'C'],
    ['N', 'N', 'C'],
    ['B', 'H', 'H'],
    ['N', 'C', 'B'],
    ['N', 'B', 'B'],
    ['B', 'N', 'B'],
    ['B', 'B', 'N'],
    ['B', 'C', 'B'],
    ['C', 'C', 'N'],
    ['C', 'N', 'C'],
];

$src = $srcProd;
$rules = $rulesProd; 

$steps = 40;
$tmpl = str_split($src);

$ltrCount = array_count_values($tmpl);

$pairs = [];

for ($i = 0; $i < count($tmpl); $i++) {
    if (isset($tmpl[$i + 1])) {
        $key = $tmpl[$i] . $tmpl[$i + 1];

        if (isset($pairs[$key])) {
            $pairs[$key]++;
        } else {
            $pairs[$key] = 1;
        }
    }
}

for ($i = 0; $i < $steps; $i++) {

    $newPairs = $pairs;

    foreach ($rules as $rule) {
        $key = $rule[0] . $rule[1];
        $newPairs[$key] = $newPairs[$key] ?? 0;

        $ls = $rule[0] . $rule[2];
        $newPairs[$ls] = $newPairs[$ls] ?? 0;

        $rs = $rule[2] . $rule[1];
        $newPairs[$rs] = $newPairs[$rs] ?? 0;

        if (isset($pairs[$key]) && $pairs[$key] > 0) {
            $currentCount = $pairs[$key];

            if (isset($ltrCount[$rule[2]])) {
                $ltrCount[$rule[2]] += $currentCount;
            } else {
                $ltrCount[$rule[2]] = $currentCount;
            }

            $newPairs[$key] -= $currentCount;
            $newPairs[$ls] += $currentCount;
            $newPairs[$rs] += $currentCount;
        } 
    }

    $pairs = $newPairs;
}

sort($ltrCount);

echo "Result : " . ($ltrCount[count($ltrCount) - 1] - $ltrCount[0]) . "\n";

