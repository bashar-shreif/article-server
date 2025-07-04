<?php 
require("../connection/connection.php");


$query = "CREATE TABLE categories(
          id INT(11) AUTO_INCREMENT PRIMARY KEY, 
          category VARCHAR(255) NOT NULL,
          description TEXT NOT NULL)";

$execute = $mysqli->prepare($query);
$execute->execute();

$mysqli->close();
?>