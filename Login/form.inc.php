<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
        $stmt = $pdo-> prepare($query);
        $stmt->execute([$username, $password, $email]);

        $pdo = null;
        $stmt = null;

        header('Location: ../Signup.html');
        die();
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
}
else {
    header('Location: ../Signup.html');
}