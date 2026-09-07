<?php

/**
 * Traveling Salesperson Problem (TSP) using Held–Karp DP
 * Works for n ≤ 20
 */

function tsp(array $dist, int $start = 0): array {
    $n = count($dist);
    $dp = [];
    $parent = [];

    // Initialize DP table
    for ($mask = 0; $mask < (1 << $n); $mask++) {
        $dp[$mask] = array_fill(0, $n, INF);
        $parent[$mask] = array_fill(0, $n, -1);
    }

    var_dump($dp); var_dump($parent); var_dump($n);exit;

    $dp[1 << $start][$start] = 0;

    // DP transitions
    for ($mask = 0; $mask < (1 << $n); $mask++) {
        for ($u = 0; $u < $n; $u++) {
            if (!($mask & (1 << $u))) continue; // city u not in mask
            if ($dp[$mask][$u] === INF) continue;

            for ($v = 0; $v < $n; $v++) {
                if ($mask & (1 << $v)) continue; // already visited
                $nextMask = $mask | (1 << $v);
                $newCost = $dp[$mask][$u] + $dist[$u][$v];

                if ($newCost < $dp[$nextMask][$v]) {
                    $dp[$nextMask][$v] = $newCost;
                    $parent[$nextMask][$v] = $u;
                }
            }
        }
    }

    // Find best tour ending at any city and returning to start
    $fullMask = (1 << $n) - 1;
    $bestCost = INF;
    $lastCity = -1;

    for ($u = 0; $u < $n; $u++) {
        if ($u === $start) continue;
        $tourCost = $dp[$fullMask][$u] + $dist[$u][$start];
        if ($tourCost < $bestCost) {
            $bestCost = $tourCost;
            $lastCity = $u;
        }
    }

    // Reconstruct path
    $path = [];
    $mask = $fullMask;
    $u = $lastCity;

    while ($u !== -1) {
        array_unshift($path, $u);
        $prev = $parent[$mask][$u];
        $mask ^= (1 << $u);
        $u = $prev;
    }

    array_unshift($path, $start);

    return [
        'path' => $path,
        'cost' => $bestCost
    ];
}

// Example usage
$dist = [
    [0, 10, 15, 20],
    [10, 0, 35, 25],
    [15, 35, 0, 30],
    [20, 25, 30, 0]
];

$result = tsp($dist, 0);

echo "Optimal Path: " . implode(" -> ", $result['path']) . PHP_EOL;
echo "Total Cost: " . $result['cost'] . PHP_EOL;
