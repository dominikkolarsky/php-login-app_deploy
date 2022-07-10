<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení | DB Login App</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div class="container">
        <?php
        include "menu.php";
        Menu();
        ?>

        <!-- form pro prihlaseni registrovanych -->
        <main>
            <H2>Přihlášení</H2>
            <div class="links">
                <a href="https://kolarsky.eu">‹ Kolarsky.eu </a>
                <a href="#">GitHub ›</a>
            </div>

            <div class="loginForm">
                <form action="prihlaseni.php" method="POST">
                    <!-- Login: -->
                    <input type="text" placeholder="Login" name="login" required><br>
                    <!-- Heslo: -->
                    <input type="password" class="mt" placeholder="Password" name="password" required><br>
                    <input type="submit" name="submit" value="Přihlásit&nbsp;se">
                </form>
                <p>Pokud nejste registován, můžete se <a href="registrace.php">registrovat zde</a>.</p>
            </div>
        </main>


    </div>



    <?php
    session_start();

    if (isset($_POST['submit'])) {
        $login = addslashes($_POST['login']);
        $password = addslashes($_POST['password']);

        // připojeni k DB
        include 'mysqli_connection.php';
        Connection();

        // select all users se stejnym login a heslo
        $sql_allUsers = "SELECT * FROM users WHERE user_login = '$login' AND user_password = '$password'";

        // pokud zadany login a heslo matchne zaznam, tak pošli na sekci pro registrovane
        if (mysqli_num_rows(mysqli_query($con, $sql_allUsers)) == 0) {
            echo ("<script>alert('Špatné přihlašovací údaje.');</script>");
        } else {
            $_SESSION['user'] = $login;
            echo ("<script>alert('Přihlášení proběhlo úspěšně.');</script>");
            echo ("<script>location.href = 'proRegistrovane.php';</script>");
        }
    }

    ?>

</body>

</html>