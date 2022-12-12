<?php 

$handle = fopen("input/day11.txt", "r");
$data = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $data[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$monkeys = [];
$currentMonkey = 0;

for ($i = 1; $i < count($data); $i += 7) { // Change i++
    $tmp = explode('Starting items: ', $data[$i])[1];
    $items = explode(', ', $tmp);

    $tmp = explode('new = old ', $data[$i + 1])[1];
    $op = explode(' ', $tmp);

    $test = explode('divisible by ', $data[$i + 2])[1];
    $trueTo = explode('throw to monkey ', $data[$i + 3])[1];
    $falseTo = explode('throw to monkey ', $data[$i + 4])[1];
    
    $monkeys[] = [
        'items' => $items,
        'op' => $op,
        'test' => $test,
        'trueTo' => $trueTo,
        'falseTo' => $falseTo,
        'inspections' => 0
    ];
}

for ($i = 0; $i < 20; $i++) {
    for ($j = 0; $j < count($monkeys); $j++) {
        foreach ($monkeys[$j]['items'] as $key => $item) {
            $nbr = $monkeys[$j]['op'][1] == 'old' ? $item : $monkeys[$j]['op'][1];

            if ($monkeys[$j]['op'][0] == '*') {
                $result = $item * $nbr;
            } else {
                $result = $item + $nbr;
            }

            $result = floor($result / 3);

            $index = $result % $monkeys[$j]['test'] == 0 ? $monkeys[$j]['trueTo'] : $monkeys[$j]['falseTo'];

            $monkeys[$index]['items'][] = $result;
            unset($monkeys[$j]['items'][$key]);

            $monkeys[$j]['inspections']++;
        }
    }
}

$inspections = array_column($monkeys, 'inspections');

sort($inspections);

echo "Result : " . ($inspections[count($inspections) - 1] * $inspections[count($inspections) - 2]) . "\n";