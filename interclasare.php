<?php
    // array-uri
    $GLOBALS["a"] = array();
    $GLOBALS["b"] = array();
    $GLOBALS["c"] = array();
    // limite
    $GLOBALS["n"] = 7;
    $GLOBALS["m"] = -1;
    // contoare
    $GLOBALS["i"] = 0;
    $GLOBALS["j"] = 0;
    $GLOBALS["k"] = 0;
    // fisiere
    $GLOBALS["fisierInput"] = file("interclasare.in");
    $GLOBALS["fisierOutput"] = fopen("interclasare.out", "w");

    /**
     * Returneaza un array cu ultimul element scos daca acesta este mai mic ca penultimul
     */
    function elementZero($listaNumere)
    {
        $ultimulEl = end($listaNumere);
        $pUltimulEl = prev($listaNumere);

        if ($ultimulEl < $pUltimulEl)
        {
            array_pop($listaNumere);
        }

        return $listaNumere;
    }

    /**
     * Citeste fisierul de intrare si stocheaza in array-urile globale valorile din fisier
     */
    function citireFisier()
    {
        $fisierInput = $GLOBALS["fisierInput"];
        $GLOBALS["n"] = intval(explode(" ", $fisierInput[0])[0]);
        $ultimI = 0; // stocheaza ultima valoare a lui i, contorul pentru randurile din fisier

        // array a
        for ($i = 1; $i < count($fisierInput); $i++)
        {
            $linieCurentaArray = explode(" ", $fisierInput[$i]);
            foreach ($linieCurentaArray as $numar)
            {
                if (is_null($numar) == false)
                {
                    $GLOBALS["a"][] = intval($numar);
                    $GLOBALS["i"]++;
                }

                if ($GLOBALS["i"] == $GLOBALS["n"])
                {
                    $ultimI = $i;
                    $i = count($fisierInput); // break din for 1
                }
            }
        }
        $GLOBALS["a"] = elementZero($GLOBALS["a"]); // se taie ultimul element daca e mai mic ca penultimul

        // array b
        $GLOBALS["m"] = intval(explode(" ", $fisierInput[$ultimI + 1])[0]);
        $ultimI += 2; // se trece la linia de dupa cea cu numarul m
        for ($i = $ultimI; $i < count($fisierInput); $i++)
        {
            $linieCurentaArray = explode(" ", $fisierInput[$i]);
            foreach ($linieCurentaArray as $numar)
            {
                if (is_null($numar) == false)
                {
                    $GLOBALS["b"][] = intval($numar);
                    $GLOBALS["j"]++;
                }

                if ($GLOBALS["j"] == $GLOBALS["m"])
                {
                    $i = count($fisierInput); // break din for 1
                }
            }
        }
        $GLOBALS["b"] = elementZero($GLOBALS["b"]);
    }

    /**
     * Aceasta functie se ocupa cu interclasarea, stocheaza in array-ul global c rezultatul algoritmului
     */
    function interclasare()
    {
        $GLOBALS["i"] = 0;
        $GLOBALS["j"] = 0;

        while ($GLOBALS["i"] < $GLOBALS["n"] && $GLOBALS["j"] < $GLOBALS["m"])
        {
            if ($GLOBALS["a"][$GLOBALS["i"]] <= $GLOBALS["b"][$GLOBALS["j"]])
            {
                array_push($GLOBALS["c"], $GLOBALS["a"][$GLOBALS["i"]]);
                $GLOBALS["i"]++;
            }
            else if ($GLOBALS["b"][$GLOBALS["j"]] <= $GLOBALS["a"][$GLOBALS["i"]])
            {
                array_push($GLOBALS["c"], $GLOBALS["b"][$GLOBALS["j"]]);
                $GLOBALS["j"]++;
            }
        }

        if ($GLOBALS["i"] != $GLOBALS["n"] && $GLOBALS["j"] == $GLOBALS["m"])
        {
            for ($i = $GLOBALS["i"]; $i < $GLOBALS["n"]; $i++)
            {
                array_push($GLOBALS["c"], $GLOBALS["a"][$i]);
            }
        }

        if ($GLOBALS["j"] != $GLOBALS["m"] && $GLOBALS["i"] == $GLOBALS["n"])
        {
            for ($j = $GLOBALS["j"]; $j < $GLOBALS["m"]; $j++)
            {
                array_push($GLOBALS["c"], $GLOBALS["b"][$j]);
            }
        }
    }

    /**
     * Aceasta functie afiseaza array-ul c
     */
    function afisare()
    {
        for ($i = 0; $i < count($GLOBALS["c"]); $i++)
        {
            if ((intval(intval($i) % 10) == 0) && ($i != 0))
            {
                fwrite($GLOBALS["fisierOutput"], "\n");
            }

            fwrite($GLOBALS["fisierOutput"], $GLOBALS["c"][$i] . " ");
        }
    }

    // apelare functii
    citireFisier();
    interclasare();
    afisare();