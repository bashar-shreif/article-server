<?php
require("../connection/connection.php");




$query = "ALTER TABLE articles ADD category_id INT";
$query2 = "ALTER TABLE articles ADD CONSTRAINT fk_category
                FOREIGN KEY (category_id) REFERENCES categories(id);";

$execute = $mysqli->prepare($query);
$execute2 = $mysqli->prepare($query2);
$execute->execute();
$execute2->execute();

$mysqli->close();
?>