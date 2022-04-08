<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <div id="logo">
        <img src="wzor.png" alt="wzór BMI">
    </div>
    <div id="banner">
        <h1>Oblicz swoje BMI</h1>
    </div>
    <main>
        <!-- Skrypt 1 -->
        <table>
            <tr>
                <th>Interpretacja BMI</th>
                <th>Wartość minimalna</th>
                <th>Wartosc maksymalna</th>
            </tr>
            <?php
                @$polaczenie = mysqli_connect('localhost','root','','egzamin');
                
                if(mysqli_error($polaczenie)){
                    echo "Błąd łączenia z bazą danych :<";
                }else{
                    $zapytanie = "SELECT informacja, wart_min, wart_max FROM bmi";
                    $wynik = mysqli_query($polaczenie, $zapytanie);

                    if(mysqli_num_rows($wynik)>0){
                        while($row=mysqli_fetch_array($wynik)){
                            echo "<tr>";
                                echo "<td>". $row['informacja'] . "</td>";
                                echo "<td>". $row['wart_min'] . "</td>";
                                echo "<td>". $row['wart_max'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }
            ?>
        </table>
    </main>
    <div id="left">
        <h2>Podaj wage i wzrost</h2>
        <form method="post" action="bmi.php">
            <label>Waga:</label>
            <input type="number" min="1" name="waga">
            <br>
            <label>Wzrost w cm:</label>
            <input type="number" min="1" name="wzrost">
            <br>
            <input type="submit" value="Oblicz i zapamiętaj wynik" name="oblicz">
        </form>
        <!-- Skrypt 2 -->
        <?php
            if(isset($_POST['oblicz'])){
                $wz = $_POST['wzrost'];
                $wag = $_POST['waga'];

                if($wz && $wag){
                    $bmi = $wag/($wz*$wz);
                    $bmi = $bmi*10000;
                    echo "<p>Twoja waga: ".$wag."; Twój wzrost: ".$wz."<br>BMI wynosi: ".$bmi;

                    if($bmi<=18)
                        $wartosc=1;
                        else if($bmi<=25)
                            $wartosc=2;
                            else if($bmi<=30)
                                $wartosc=3;
                                else if($bmi<=100)
                                    $wynik=4;

                    $data = date("Y-m-d");
                    
                    $zapytanie2 = "INSERT INTO `wynik` (`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES (NULL, '$wartosc', '$data', '$bmi');";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                
                }
            }

            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="right">
        <img src="rys1.png" alt="ćwiczenia">
    </div>
    <footer>
        Autor: 000000000000 <a href="kwerendy.txt">Zobacz kwerendy</a>
    </footer>
</body>
</html>