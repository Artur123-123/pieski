<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forum o psach</title>
</head>
<body>
    <div id="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div id="lewy">
        <img src="piesek.jpg" alt="">
    </div>
    <div class="prawy">
        <h2>Zapisz się</h2>
        <form action="logowanie.php" method="post">
            login: <input type="text" name="log" id="">
            <br>
            hasło: <input type="password" name="has" id="">
            <br>
            powtórz hasło: <input type="password" name="hasl" id="">
            <button type="submit">Zapisz</button>

            <?php 

            if(isset( $_POST['log'])) {
                $log = $_POST['log'];
                $has = $_POST['has'];
                $hasl = $_POST['hasl'];

                if(empty($log) || empty($has) || empty($hasl)) 
                {
                    echo "<p>Wypełnij wszystkie pola</p>";
                } 
                else 
                {
                    if($has != $hasl) {
                        echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                    }
                    else 
                    {
                        $db=mysqli_connect('localhost', 'root', '', 'psy');
                        $zap3=mysqli_query($db, "SELECT * FROM `uzytkownicy` WHERE login='$log'");
                        if(mysqli_num_rows($zap3)>0) {
                            echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                        }
                        else 
                        {
                            $szyfr=sha1($has);
                            $dodawanie=mysqli_query($db, "INSERT INTO uzytkownicy(login, haslo) VALUES ('$log','$szyfr')");
                            echo "<p>Konto zostało dodane</p>";
                        }
                        $close=mysqli_close($db);
                    }
                }
            }

            ?>

        </form>
    </div>
    <div class="prawy">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <footer>
        Stronę wykonał: 1010101010101010101010
    </footer>
</body>
</html>