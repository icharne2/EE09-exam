<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Rozgywki futbolowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="banner">
        <h2>Światowe rozgrywki piłkarskie</h2>
        <img src="obraz1.jpg" alt="boisko">
    </div>
    <div id="mecze">
        <!-- Skrypt 1 -->
        <?php
            @$polaczenie = mysqli_connect('localhost','root','','egzamin');
            if(!$polaczenie){
                echo "Wystąpił błąd połączenia z bazą danych :<";
            }else{
                $zapytanie = 'SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1="EVG"';
                $wynik = mysqli_query($polaczenie,$zapytanie);
                
                if(!$wynik){
                    echo "Błąd zapytania :<";
                }else{
                    if(mysqli_num_rows($wynik)>0){
                        while($row = mysqli_fetch_array($wynik)){
                            echo '<div class="rozgrywka">';
                                echo "<h3>" .$row['zespol1']. " - " . $row['zespol2'] . "</h3>";
                                echo "<h4>" .$row['wynik'] . "</h4>";
                                echo "<p>W dniu: " . $row['data_rozgrywki'] . "</p>";
                            echo "</div>";
                        }
                    }
                }
                
            }
        ?>
    </div> 
    <main>
        <h2>Reprezentacja Polski</h2>
        <div id="left">
            <p>Podaj propozycję zawodniów (1-bramkarze, 2-obroncy, 3-pomocnicy, 4-napastnicy):</p>
        <form method="post" action="futbol.php"> 
            <input type="number" min="1" max="4" name="numer">
            <input type="submit" value="Sprawdź" name="przeslij">
        </form>
            <ul>
            <!-- Skrypt 2 -->
                <?php
                    if(isset($_POST['przeslij'])){
                        $n = $_POST['numer'];

                        if($n){
                            $zapytanie2 = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id='$n'";
                            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                            // print_r($zapytanie2);

                            if(mysqli_num_rows($wynik2)>0){
                                while($row2 = mysqli_fetch_array($wynik2)){
                                    echo "<li><p>" . $row2['imie'] . " " . $row2['nazwisko'] . "</p></li>";
                                }
                            }

                        }
                    }
                mysqli_close($polaczenie);
                ?>
            </ul>
        </div>
        <div id="right">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: 000000000000</p>
        </div>
    </main>
</body>
</html>