<?php 

$handle = fopen("input/day4.txt", "r");
$data = [];

$createNew = true;

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $item = explode("\n", $line)[0];

        if (empty($item)) {
            $createNew = true;
        } else {
            if ($createNew) {
                $data[] = $item;
                $createNew = false;
            } else {
                $data[count($data) - 1] .= ' ' . $item;
            }
        }
    }

    fclose($handle);
}

$allInfos = ['byr', 'iyr', 'eyr', 'hgt', 'hcl', 'ecl', 'pid', 'cid'];
$valid = 0;


foreach ($data as $item) {
    $infos = explode(' ', $item);

    $currentInfo = [];

    foreach ($infos as $info) {
        $tmp = explode(':', $info);

        $currentInfo[$tmp[0]] = $tmp[1]; 
    }

    $isValid = true;
    $failed = [];

    if (!isset($currentInfo['byr']) || strlen($currentInfo['byr']) != 4 || !is_numeric($currentInfo['byr']) || $currentInfo['byr'] < 1920 || $currentInfo['byr'] > 2002) {
        $isValid = false;
        $failed[] = 'byr';
    }

    if (!isset($currentInfo['iyr']) || strlen($currentInfo['iyr']) != 4 || !is_numeric($currentInfo['iyr']) || $currentInfo['iyr'] < 2010 || $currentInfo['iyr'] > 2020) {
        $isValid = false;
        $failed[] = 'iyr';
    }

    if (!isset($currentInfo['eyr']) || strlen($currentInfo['eyr']) != 4 || !is_numeric($currentInfo['eyr']) || $currentInfo['eyr'] < 2020 || $currentInfo['eyr'] > 2030) {
        $isValid = false;
        $failed[] = 'eyr';
    }

    if (isset($currentInfo['hgt']) && strlen($currentInfo['hgt']) >= 4) {
        $unit = substr($currentInfo['hgt'], -2);
        
        if ($unit == 'cm') {
            $nbr = substr($currentInfo['hgt'], 0, 3);

            if (!is_numeric($nbr) || $nbr < 150 || $nbr > 193) {
                $isValid = false;
                $failed[] = 'hgt';
            }
        } else if ($unit == 'in') {
            $nbr = substr($currentInfo['hgt'], 0, 2);

            if (!is_numeric($nbr) || $nbr < 59 || $nbr > 76) {
                $isValid = false;
                $failed[] = 'hgt';
            }
        } else {
            $isValid = false;
            $failed[] = 'hgt';
        }
    } else {
        $isValid = false;
        $failed[] = 'hgt';
    }

    if (!isset($currentInfo['hcl']) || empty(preg_match('/^#[0-9A-Fa-f]{6}$/', $currentInfo['hcl']))) {
        $isValid = false;
        $failed[] = 'hcl';
    }

    if (!isset($currentInfo['ecl']) || !in_array($currentInfo['ecl'], ['amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth'])) {
        $isValid = false;
        $failed[] = 'ecl';
    }

    if (!isset($currentInfo['pid']) || strlen($currentInfo['pid']) != 9 || !is_numeric($currentInfo['pid'])) {
        $isValid = false;
        $failed[] = 'pid';
    }

    if ($isValid) {
        $valid++;
    } else {
        echo "Failed: " . implode(', ', $failed) . "\n";
    }
}

echo "Result: " . $valid . "\n";