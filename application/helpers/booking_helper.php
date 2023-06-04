<?php

function invoice($last)

{
    $inisial = 'RNS';
    $panjang = 8;


    if ($last == null) {
        $angka = 0;
    } else {
        $angka = intval(substr($last, 3));
    }

    $angka++;
    $angka    = strval($angka);
    $tmp    = "";
    for ($i = 1; $i <= ($panjang - strlen($inisial) - strlen($angka)); $i++) {
        $tmp = $tmp . "0";
    }
    return $inisial . $tmp . $angka;
}
