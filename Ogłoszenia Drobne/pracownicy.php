<?php
    $poloczenie = mysqli_connect('localhost', 'root', '',  'dane');

    // Skrypt 1
    $zapytanie2 = "SELECT 'imie', 'nazwisko' FROM pracownicy";
    
    $wynik = mysqli_query($poloczenie, $zapytanie2);

    if(mysqli_num_rows($wynik) > 0){
        echo "<ul>";
        while($r = mysqli_fetch_assoc($wynik)) {
            echo "<li>".$r['imie']." ".$r['nazwisko']."</li>";
            // print_r($r);
        }
    }


    $zapytanie2_2 = "SELECT COUNT(id) as 'ilosc' FROM pracownicy";
    $wynik2 = mysqli_query($poloczenie, $zapytanie2_2);

    echo "</ul>";

    // Skrypt 2

    $zapytanie1 = "SELECT imie, nazwisko, nazwa from pracownicy JOIN stanowisko on pracownicy.id_stanowiska = stanowisko.id;";
    $wynik3 = mysqli_query($poloczenie, $zapytanie1);



    mysqli_close($poloczenie);

?>