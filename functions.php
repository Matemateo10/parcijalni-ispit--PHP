<?php

    function brojacZnakova($verbum){
        
        $verbum = strtolower($verbum); // transformira string u mala slova
        $verbum = str_split($verbum); //podijeli string na slova (niza/polja)

        $suglasnik = 0;
        $samoglasnik = 0;

        foreach($verbum as $character){

            switch($character){

                case "a":
                case "e":
                case "i":
                case "o":
                case "u":
                    $samoglasnik++;
                    break;
                default:
                    $suglasnik++;
                    break;
            }
        }  return array($samoglasnik, $suglasnik);
    }