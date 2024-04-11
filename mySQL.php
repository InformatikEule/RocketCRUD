<?php
//TODO verbindung zu der DB auf einem NAS herstellen
$host = "localhost";
//name der DB hier ändern falls gewünscht:
$name = "test"; 
//root ist der standard-user für mariaDB. solltet ihr mit selbstangelegten nutzern arbeiten muss hier der Nutername hin:
$user = "root";
//wer hätte das gedacht, hier muss das PW rein:
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
