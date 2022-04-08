<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <div id="jeden">
            <img src="logo1.png" alt="Mój kalendarz">
        </div>
        <div id="dwa">
            <h1>KALENDARZ</h1>
            <!-- Skrypt 1 -->
            <?php
                @$polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin5');

                if(mysqli_error($polaczenie)){
                    echo "Błąd połączenia z bazą danych :<";
                }else{
                    $zapytanie = "SELECT miesiac, rok FROM zadania WHERE dataZadania LIKE '2020-07-01'";
                    $wynik = mysqli_query($polaczenie, $zapytanie);

                    if(mysqli_num_rows($wynik)>0){
                        while($row = mysqli_fetch_array($wynik)){
                            echo "<h3> miesiąc: " . $row['miesiac']. ", rok: " . $row['rok'] . "</h3>";
                        }
                    }
                }

            ?>
        </div>
    </header>
    <main>
        <!-- Skrypt 2 -->
        <?php

            $zapytanie2 = "SELECT dataZadania, wpis FROM zadania WHERE miesiac LIKE 'lipiec'";
            $wynik2 = mysqli_query($polaczenie, $zapytanie2);
            
            if(mysqli_num_rows($wynik2)>0){
                while($r = mysqli_fetch_array($wynik2)){
                    echo '<div class="dane">';
                        echo '<p class="data">' . $r['dataZadania'] . '</p>';
                        echo '<p>' . $r['wpis'] . '</p>';
                    echo '</div>';
                }
            }
        ?>
    </main>
    <footer>
        <form method="post" action="kalendarz.php">
            <label>dodaj wpis:</label>
            <input type="text" name="wpis">
            <input type="submit" value="DODAJ" name="dodaj">
        </form>
        <!-- Odczyt z formularza -->
        <?php
            if(isset($_POST['dodaj'])){
                $d = $_POST['wpis'];

                $zapytanie3 = "UPDATE `zadania` SET `wpis`='$d' WHERE dataZadania LIKE '2020-07-13'";
                $wynik3 = mysqli_query($polaczenie, $zapytanie3);

                if($zapytanie3){
                    echo "Uaktualnione";
                }
            }
            
            mysqli_close($polaczenie);
        ?>
        <p>Strone wykonał: 000000000000</p>
    </footer>
</body>
</html>