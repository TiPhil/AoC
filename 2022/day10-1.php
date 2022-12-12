<?php 

$handle = fopen("input/day10.txt", "r");
$ops = [];

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $ops[] = explode("\n", $line)[0];
    }

    fclose($handle);
}

$register = 1;
$cycle = 1;
$strength = 0;

$targetCycle = [20, 60, 100, 140, 180, 220];

foreach ($ops as $op) {
    if (in_array($cycle, $targetCycle)) {
        $strength += $register * $cycle;
    }

    if ($op == 'noop') {
        $cycle++;
    } else {
        $qte = explode(' ', $op)[1];

        $cycle++;

        if (in_array($cycle, $targetCycle)) {
            $strength += $register * $cycle;
        }

        $cycle++;

        $register += $qte;
    }
}

echo "Result : " . $strength . "\n";