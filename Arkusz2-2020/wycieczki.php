<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wycieczki i urlopy</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <div id="left">
        <h2>KONTAKT</h2>
        <a href="mailto:biuro@wycieczki.pl">napis do nas</a>
        <p>telefon: 555666777</p>
    </div>
    <div id="con">
        <h2>GALERIA</h2>
        <!-- Skrypt 1 -->
        <?php
            @$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin3');
            if(mysqli_error($polaczenie)){
                echo "Błąd połączenia z bazą danych ups :<";
            }else{
                $zapytanie = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis ASC";
                $wynik = mysqli_query($polaczenie, $zapytanie);

                if(mysqli_num_rows($wynik)>0){
                    while($row = mysqli_fetch_array($wynik)){
                        echo '<img src="./'.$row['nazwaPliku'].'" alt="'. $row['podpis'] .'">';
                    }
                }
            }
        ?>
    </div>
    <div id="right">
        <h2>PROMOCJE</h2>
        <table>
            <tr>
                <td>Jesien</td>
                <td>Grupa 4+</td>
                <td>Grupa 10+</td>
            </tr>
            <tr>
                <td>5%</td>
                <td>10%</td>
                <td>15%</td>
            </tr>
        </table>
    </div>
    <main>
        <h2>LISTA WYCIECZEK</h2>
        <!-- Skrypt 2 -->
        <?php
            $zapytanie2 = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna=1";
            $wynik2= mysqli_query($polaczenie, $zapytanie2);

            if(mysqli_num_rows($wynik2)>0){
                while($r = mysqli_fetch_array($wynik2)){
                    echo '<p>'.$r['id']. ". " . $r['dataWyjazdu']. ", ". $r['cel'] . ", cena: " . $r['cena'] . "<p>";
                }
            }

            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <p>Strone wykonał: XXXXXXXXXXXX</p>
    </footer>
</body>
</html>