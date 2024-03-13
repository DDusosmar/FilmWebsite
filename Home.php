<!DOCTYPE html>
<html lang="en">

    <?php
        $servername = "localhost";
        $username = "dbuser";
        $password = "zGfaIW9YDH1GFa2e";
        $dbname = "movies.cc_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Verbinding mislukt: " . $conn->connect_error);
        }
        ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/CSS/styles.css">
    <title>Movies.cc</title>
</head>

<body>
    <header>
        <div>
            <a href="./Home.php">
                <img src="./assets/images/Logo.svg" alt="Logo">
            </a>
        </div>
    </header>
    <main>
        <section>
            <div>
            <h1>Filmen, TV Shows, & Meer.</h1>

            <?php
            session_start();
            if (isset($_SESSION["username"])) {
                echo "<div>Welkom, " . $_SESSION["username"] . "!</div>";
                echo "<div><a href=\"./content.html\"><button>Bekijk Nu</button></a></div>";
            } else {
                echo "<div>Wil je de films bekijken, meld je dan aan om verder te gaan.</div>";
                echo "<div><a href=\"./Aanmelden.php\"><button>Log In / Sign Up</button></a></div>";
            }

            $conn->close();
            ?>
            
            </div>
        </section>
    </main>
    <footer>
        <div>
            <div>
                <p>&copy; 2024 Alle rechten voorbehouden <a href="#">D&R Filmen</a></p>
                <div></div>
                <img src="./assets/images/footer-bottom-img.png" alt="Online banking Companies">
            </div>
        </div>
    </footer>
</body>
</html>