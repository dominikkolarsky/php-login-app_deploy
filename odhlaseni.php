<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odhlášení | DB Login App</title>
    <link rel="stylesheet" href="app.css">

</head>

<body>
    <div class="container">
        <?php
        include "menu.php";
        Menu();
        ?>

        <main>
            <H2>Odhlášení</H2>
            <?php
            // logika pro odhlašení
            session_start();

            unset($_SESSION['user']);
            echo ("<div class='loginForm'><p>Byl jste odhlašen.<br><br> Pokud chcete, můžete se opětovně <a href='prihlaseni.php'>přihlásit</a>.</p></div>");
            ?>
        </main>

    </div>

</body>

</html>