<?php

$servername = "localhost";
$username = "ericV";
$password = "ericVpw";
$dbname = "guessthenumber";

$tempNumberOfMove = $_SESSION['numberOfMove'];
$tempPseudo = $_SESSION['pseudo'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO highscore (pseudo, score)
  VALUES ('$tempPseudo', $tempNumberOfMove)";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
