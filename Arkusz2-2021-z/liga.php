<!Doctype HTML>
<html lang="pl">
    <head>
        <link rel="stylesheet" href="styl2.css">
        <title>piłka nożna</title>
        <meta charset="UTF-8">
</head>
<body>
    <div id="banner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>
    <div id="left">
        <form method="post" action="liga.php">
            <select name="opcja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz" name="pokaz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 000000000000</p>
    </div>
    <div id="right">
        <ol>
            <!-- Skrypt 1 -->
            <?php
                @$polaczenie = mysqli_connect('localhost', 'root', '','egzamin');
                if(mysqli_error($polaczenie)){
                    echo "Błąd z połączeniem z bazą danych :<";
                }else{
                    if(isset($_POST['pokaz'])){
                        $w = $_POST['opcja'];

                        if($w){
                            $zapytanie = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id='$w'";
                            $wynik = mysqli_query($polaczenie, $zapytanie);
                            
                            if(mysqli_num_rows($wynik)>0){
                                while($row = mysqli_fetch_array($wynik)){
                                    echo "<li><p>" .$row['imie'] . " ". $row['nazwisko'] . "</p></li>";
                                }
                            }
                        }
                    }
                }
            ?>
        </ol>
    </div>
    <main>
        <h3>Liga mistrzów</h3>
    </main>
    <div id="liga">
        <!-- Skrypt 2 -->
        <?php
            $zapytanie2 = "SELECT zespol, punkty, grupa FROM liga GROUP BY punkty DESC";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            
            if(mysqli_num_rows($wynik2)>0){
                while($row2 = mysqli_fetch_array($wynik2)){
                    echo "<div class='druzyna'>";
                        echo "<h2>" . $row2['zespol'] . "</h2>";
                        echo "<h1>". $row2['punkty'] ."</h1>";
                        echo "<p>grupa: " . $row2['grupa'] . "</p>";
                    echo "</div>";
                }
            }

            mysqli_close($polaczenie);
        ?>
    </div>
<body>
</html>