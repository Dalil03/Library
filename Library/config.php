<?php

$user = 'root';
$pass = '';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);
    User::setDBH($dbh);
} catch (PDOException $e) {
    echo 'Erreur' . $e;
}


?>


