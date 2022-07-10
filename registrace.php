<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace | DB Login App</title>
    <link rel="stylesheet" href="app.css">

</head>

<body>
    <div class="container">
        <?php
        include "menu.php";
        Menu();
        ?>

        <!-- form registrace -->
        <main>
            <H2>Registrace</H2>

            <div class="links">
                <a href="https://kolarsky.eu">‹ Kolarsky.eu </a>
                <a href="#">GitHub ›</a>
            </div>

            <div class="loginForm">
                <form action="registrace.php" method="post">
                    <!-- Jméno: <br> -->
                    <!-- required = pokud nejaky input neni vyplneny = form se neodesle -->
                    <input type="text" placeholder="Jméno" name="name" required> <br>
                    <!-- Příjmení: <br> -->
                    <input type="text" class="mt" placeholder="Příjmení" name="surname" required> <br>
                    <!-- Login: <br> -->
                    <input type="text" class="mt" placeholder="Login" name="login" required> <br>
                    <!-- Heslo: <br> -->
                    <input type="password" class="mt" placeholder="Heslo" name="password" required><br>
                    <!-- Heslo znovu: <br> -->
                    <input type="password" class="mt" placeholder="Zopakujte heslo" name="password2" required><br>
                    <input type="submit" name="submit" value="Registrovat&nbsp;se">

                </form>
                <p>Pokud už účet máte, stačí se <a href="prihlaseni.php">přihlásit</a>.</p>
            </div>
        </main>

    </div>



    </main>


    </div>



    <?php
    // logika registrace

    // volání funkce připojeni a kontrola pripojeni k DB
    include "mysqli_connection.php";
    Connection();

    // start session pro okamžity login
    session_start();

    if (isset($_POST['submit'])) {
        $name = addslashes($_POST['name']);
        $surname = addslashes($_POST['surname']);
        $login = addslashes($_POST['login']);
        $password = addslashes($_POST['password']);
        $password2 = addslashes($_POST['password2']);

        // pokud hesla nejsou stejná tak vyhod alert
        if ($password != $password2) {
            echo ("<script>alert('Hesla nejsou shodna! Zkus to znovu. ;)');</script>");
        }
        // pokud jsou stejná tak registruj
        else {
            // vyber vsechny stejne login
            $sql_allSameLogin = "SELECT * FROM users WHERE user_login = '$login'";
            $numberOfSame = mysqli_query($con, $sql_allSameLogin);
            // kontrola zda existuji stejne jako zadavany login
            if (mysqli_num_rows($numberOfSame) != 0) {
                echo ("<script>alert('Login uživatele už existuje.'");
            }
            // pokud ne, proved registraci
            else {
                $sql_insert = "INSERT INTO users (user_name, user_surname, user_login, user_password) 
                VALUES ('$name','$surname','$login','$password')";
                if (mysqli_query($con, $sql_insert)) {
                    echo ("<script>alert('Registrace proběhla úspěšně.');</script>");
                    // zacni session
                    $_SESSION['user'] = $login;
                } else {
                    echo ("<script>alert('Chyba, registrace neproběhla.');</script>");
                }
            }
        }
        mysqli_close($con);
    }

    ?>

</body>

</html>