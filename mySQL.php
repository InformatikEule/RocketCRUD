<?php
$host = "localhost";
$name = "test"; 
$user = "root";
$passwort = "";


//versuche eine verbindung zur DB herzustellen und in einem PHP-Database-Objekt zu speichern.
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
//wenn nicht, gebe fehler aus!
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}

function getRetouren(){
  $stmt = $conn->prepare("SELECT * FROM raketen");
  $stmt->execute();
  $retouren = $stmt->fetchAll();
  return $retouren;
}

?>
