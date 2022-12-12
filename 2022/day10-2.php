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

$draw[0] = '';
$draw[1] = '';
$draw[2] = '';
$draw[3] = '';
$draw[4] = '';
$draw[5] = '';

foreach ($ops as $op) {
    // During
    duringCycle($draw, $cycle, $register);

    if ($op == 'noop') {
        $cycle++;
    } else {
        $qte = explode(' ', $op)[1];

        $cycle++;

        duringCycle($draw, $cycle, $register);

        $cycle++;

        // After
        $register += $qte;
    }
}

echo "Result : \n";
echo $draw[0] . "\n";
echo $draw[1] . "\n";
echo $draw[2] . "\n";
echo $draw[3] . "\n";
echo $draw[4] . "\n";
echo $draw[5] . "\n";

function duringCycle(&$draw, $cycle, $register) {
    $row = floor(($cycle - 1) / 40);
    $cycle -= $row * 40;

    if (in_array($cycle - 1, [$register, $register - 1, $register + 1])) {
        $draw[$row] .= '#';

        if ($row == 0) {
            var_dump($cycle . ' - ' . $register . ' - #');
        }
    
    } else {
        $draw[$row] .= '.';

        if ($row == 0) {
            var_dump($cycle . ' - ' . $register . ' - .');
        }
    }    
}