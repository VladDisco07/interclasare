# Interclasare
Acest repository contine rezolvarea problemei [Interclasare](https://www.pbinfo.ro/probleme/241/interclasare) in limbajul PHP.
***
## Cerinţa
Se dau două şiruri `a` şi `b`, cu `n`, respectiv `m` elemente, numere naturale, ordonate crescător. Să se construiască un al treilea şir, `c`, care să conţină, în ordine crescătoare, elementele din şirurile `a` şi `b`.

## Date de intrare
Fişierul de intrare `interclasare.in` conţine pe prima linie numărul `n`; urmează `n` numere naturale, ordonate crescător, ce pot fi dispuse pe mai multe linii. Linia următoare conţine numărul `m` şi urmează `m` numere naturale, ordonate crescător, ce pot fi dispuse pe mai multe linii.

## Date de ieşire
Fişierul de ieşire `interclasare.out` va conţine elementele şirului construit, câte 10 valori pe o linie, elementele de pe o linie fiind separate printr-un spaţiu. Ultima linie a fişierului poate să conţină mai puţin de 10 valori.

## Restricţii şi precizări
* `1 ≤ n, m ≤ 100.000`
* valorile elementelor celor două şiruri vor fi mai mici decât `1.000.000`

## Exemplu:
`interclasare.in`
```
7
1 3 4 6
7 8 8 
8
2 4 5 6 8
9 9 12
```
`interclasare.out`
```
1 2 3 4 4 5 6 6 7 8 
8 8 9 9 12 
```
