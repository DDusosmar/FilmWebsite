<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/CSS/styles.css">
    <title>Movies.cc/LogIn</title>  
</head>
<body>
    <header>
        <div>
            <a href="./Home.php">
                <img src="./assets/images/Logo.svg" alt="Logo">
            </a>
        </div>
    </header>
    <div>
        <h2>Inloggen of Aanmelden</h2>
        <?php
        session_start();

        $dsn = "mysql:host=localhost;dbname=movies.cc_db";
        $dbusername = "dbuser";
        $dbpassword = "zGfaIW9YDH1GFa2e";

        try {
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "connection failed" . $e->getMessage();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            try {
                require_once "dbh.inc.php";

                $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
                $stmt = $pdo-> prepare($query);
                $stmt->execute([$username, $password, $email]);

                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;

                $pdo = null;
                $stmt = null;

                echo "<p>U bent geregistreerd!</p>";
                echo "<meta http-equiv='refresh' content='2;URL=Home.html'>";
            } catch (PDOException $e) {
                echo "Query failed" . $e->getMessage();
            }
        }
        ?>
        <form method="post">
            <table cellspacing="5" cellpadding="0"  width="50%">
                <tr><td><input type='text' name='username' size='50' placeholder='Gebruikersnaam of Emailaddres'></td></tr>
                <tr><td><input type='password' name='password' size='50' placeholder='Wachtwoord'></td></tr>
            </table>
            <input type="submit" name="Inloggen" value="Aanmelden">
        </form>
    </div>
</body>
</html>