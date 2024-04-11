<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Raketen</title>
  </head>
  <body>
  <div class="frontpic img-fluid rounded float-right mx-auto d-block">
      <img style="max-width: 50%; max-height: 50%"  src="bilder/Artemis-titlepic.jpg">
    <?php
    if(isset($_POST["submit"])){
      require("mysql.php");
      //hole alles aus der Datenbank zu dem Nutzer der im feld "username" eingegeben wurde
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      //WENN daten gefunden wurden (zeilenanzahl ==1)...
      if($count == 1){
        $row = $stmt->fetch();
	//WENN das Passwort das eingegeben wurde mit dem in der DB übereinstimmt...
        if($_POST["pw"] == $row["PASSWORD"]){
          //DANN starte eine Session und leite an die "geheime seite".
          session_start();
          $_SESSION["username"] = $row["USERNAME"];
          header("Location: main.php");
  	  //ODER eben nicht *sadface.jpg
        } else {
          echo "Username oder Passwort stimmen nicht!";
        }
      } else {
        echo "Der Login ist fehlgeschlagen";
      }
    }
     ?>
	<div class="login">
	  <h1>Anmelden</h1>
	  <form action="index.php" method="post">
		<input type="text" name="username" placeholder="Username" required><br>
		<input type="password" name="pw" placeholder="Passwort" required><br>
		<button type="submit" name="submit">Login</button>
	  </form>
	</div>
	<br>
  </div>
  </body>
</html>