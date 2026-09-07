
## Traveling Salesperson Problem (TSP)

### Problem Statement

You are given **n** cities and the pairwise distances between them. Starting from city **0**, you must visit **every other city exactly once** and return to city **0**.  

Find a tour (order of visiting cities) with the **minimum total distance**.

### Input Format

- The first line contains an integer `n` — the number of cities (`2 ≤ n ≤ 20` for exact solutions).
- The next `n` lines each contain `n` integers.  
  The `(i+1)`-th line contains `n` integers:  
  `dist[i][0] dist[i] [jeffe.cs.illinois](https://jeffe.cs.illinois.edu/open/algo.html) ... dist[i][n-1]`

Where:
- `dist[i][j]` is the distance from city `i` to city `j`.
- `dist[i][i] = 0` for all `i`.
- Distances are non-negative integers.

### Output Format

- First line: the minimum total distance of a valid tour.
- Second line: `n+1` integers representing the tour, starting and ending at city `0`.  
  Format: `p0 p1 p2 ... p(n-1) p0` where `p0 = 0` and `[p0, p1, ..., p(n-1)]` is a permutation of all cities.

If multiple optimal tours exist, output any one of them.

### Constraints

- `2 ≤ n ≤ 20` (for exact algorithms)
- `0 ≤ dist[i][j] ≤ 10^6`
- `dist[i][i] = 0`
- Distances may be symmetric (`dist[i][j] = dist[j][i]`) or asymmetric.

### Example 1

**Input**
```text
4
0 10 15 20
10 0 35 25
15 35 0 30
20 25 30 0
```

**One possible Output**
```text
80
0 1 3 2 0
```

**Explanation**

Tour: `0 → 1 → 3 → 2 → 0`

Cost:
- `0 → 1` : 10  
- `1 → 3` : 25  
- `3 → 2` : 30  
- `2 → 0` : 15  

Total = `10 + 25 + 30 + 15 = 80`

### Example 2

**Input**
```text
5
0 10 15 20 25
10 0 35 25 30
15 35 0 30 40
20 25 30 0 35
25 30 40 35 0
```

**One possible Output**
```text
125
0 1 3 4 2 0
```

*(Exact optimal value may differ depending on distances; this is illustrative.)*

### Notes

- This is a classic **NP-hard** problem.  
- For `n ≤ 20`, an exact solution using **dynamic programming with bitmasking** (Held–Karp algorithm) is feasible.  
- For larger `n`, you must use heuristics or approximation algorithms.