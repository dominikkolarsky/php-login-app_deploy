<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro registrované | DB Login App</title>
    <link rel="stylesheet" href="app.css">

</head>

<body>
    <div class="container">
        <?php
        include "menu.php";
        Menu();
        ?>

        <main>
            <H2>Pro registrované</H2>

            <?php
            session_start();

            // logika pro zobrazeni obsahu pouze pro registrovane
            if (!isset($_SESSION['user'])) {
                echo ("<div class='loginForm'><p>Nejste přihlášen.<br><br> Pokud chcete, můžete se <a href='prihlaseni.php'>přihlásit zde</a>.</p></div>");
                die;
            } else {
                echo ("<div class='loginForm'><p>Vtípek se zobrazuje pouze přihlášeným.</p><br><img src='joke.jpg' width='360px' height='auto'/></div>");
            }
            ?>
        </main>
    </div>

</body>

</html>