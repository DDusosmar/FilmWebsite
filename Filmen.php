<!DOCTYPE html>
<html>

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
    <h1>Filmen</h1>
    <form method="get">
        <label for="genre">Genre</label>
        <select name="genre" id="genre">
            <option value="">Selecteer een genre</option>

            <?php
            $sql = "SELECT Genre_name FROM genre";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["Genre_name"] . "'>" . $row["Genre_name"] . "</option>";
            }
            ?>

        </select>
        <button type="submit">Filter</button>
    </form>
    <ul>

        <?php
        $titel = isset($_GET['titel']) ? $_GET['titel'] : '';
        $genre = isset($_GET['genre']) ? $_GET['genre'] : '';
        $regisseur = isset($_GET['regisseur']) ? $_GET['regisseur'] : '';
        $releasejaar = isset($_GET['releasejaar']) ? $_GET['releasejaar'] : '';

        $query = "SELECT * FROM films WHERE 1=1";
        if (!empty($titel)) {
            $query .= " AND titel = '$titel'";
        }
        if (!empty($genre)) {
            $query .= " AND genre = '$genre'";
        }
        if (!empty($regisseur)) {
            $query .= " AND regisseur = '$regisseur'";
        }
        if (!empty($releasejaar)) {
            $query .= " AND releasejaar = '$releasejaar'";
        }

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<h2>" . $row["titel"] . "</h2>";
                echo "<p>Genre: " . $row["genre"] . "</p>";
                echo "<p>Description: " . $row["description"] . "</p>";
                echo "<p>Regisseur: " . $row["regisseur"] . "</p>";
                echo "<img src='" . $row["poster"] . "' alt='" . $row["titel"] . "'>";
                echo "</li>";
            }
        } else {
            echo "<li>Geen films gevonden.</li>";
        }

        $conn->close();
        ?>

    </ul>
</body>
</html>