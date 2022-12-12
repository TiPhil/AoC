<?php 

$src = [
    'vn-DD',
    'qm-DD',
    'MV-xy',
    'end-xy',
    'KG-end',
    'end-kw',
    'qm-xy',
    'start-vn',
    'MV-vn',
    'vn-ko',
    'lj-KG',
    'DD-xy',
    'lj-kh',
    'lj-MV',
    'ko-MV',
    'kw-qm',
    'qm-MV',
    'lj-kw',
    'VH-lj',
    'ko-qm',
    'ko-start',
    'MV-start',
    'DD-ko',
];

$srcTest3 = [
    'fs-end',
    'he-DX',
    'fs-he',
    'start-DX',
    'pj-DX',
    'end-zg',
    'zg-sl',
    'zg-pj',
    'pj-he',
    'RW-he',
    'fs-DX',
    'pj-RW',
    'zg-RW',
    'start-pj',
    'he-WI',
    'zg-he',
    'pj-fs',
    'start-RW',
];


$srcTest2 = [
    'dc-end',
    'HN-start',
    'start-kj',
    'dc-start',
    'dc-HN',
    'LN-dc',
    'HN-end',
    'kj-sa',
    'kj-HN',
    'kj-dc',
];

$srcTest = [
    'start-A',
    'start-b',
    'A-c',
    'A-b',
    'b-d',
    'A-end',
    'b-end',
];

$total = 0;
$i = 0;

$target = $src; // $src OR $srcTest
$paths = [];
$allPaths = [];
$currentPath = [];
$visited = [];
$nbPaths = 0;

foreach ($target as $item) {
    $exp = explode('-', $item);

    if (!isset($paths[$exp[0]])) {
        $paths[$exp[0]] = [];
    }

    $paths[$exp[0]][] = $exp[1];

    if (!isset($paths[$exp[1]])) {
        $paths[$exp[1]] = [];
    }

    $paths[$exp[1]][] = $exp[0];
}

$from = 'start';
$to = 'end';

$smallVertices = getSmallVertices($paths);

foreach ($smallVertices as $sv) {
    $visited = resetVisited($paths, $sv);

    $currentPath = [$from];
    findPaths($from, $to, $paths, $visited, $nbPaths, $allPaths, $currentPath);
}

///////

echo "Total: " . $nbPaths . "\n";

function findPaths($from, $to, &$paths, &$visited, &$nbPaths, &$allPaths, $currentPath) {
    if ($from == $to) {
        $pathStr = implode(', ', $currentPath);
        
        if (!in_array($pathStr, $allPaths)) {
            echo "Path " . $nbPaths . ' : ' . $pathStr . "\n";
            $allPaths[] = $pathStr;
            $nbPaths++;
        }
        
        return;
    }

    $visited[$from]--;

    foreach ($paths[$from] as $key => $path) {
        if ($visited[$path] > 0) {
            $currentPath[] = $path;

            findPaths($path, $to, $paths, $visited, $nbPaths, $allPaths, $currentPath);

            array_pop($currentPath);
        }
    }

    $visited[$from]++;
}

function resetVisited($paths, $small) {
    $visited = [];

    foreach ($paths as $key => $path) {
        $value = 0;
        
        if ($key == 'start' || $key == 'end') {
            $visited[$key] = 1;
        } else if ($key == strtolower($key)) {
            if ($key == $small) {
                $visited[$key] = 2;
            } else {
                $visited[$key] = 1;
            }
        } else {
            $visited[$key] = 9999;
        }
    }

    return $visited;
}

function getSmallVertices($paths) {
    $vertices = [];

    foreach ($paths as $key => $path) {
        if (!in_array($key, ['start', 'end']) && $key == strtolower($key)) {
            $vertices[] = $key;
        }
    }

    return $vertices;
}
