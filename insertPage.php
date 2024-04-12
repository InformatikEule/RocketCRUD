<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}


//POST methode von Button send
if(isset($_POST['send'])){
  include_once('mySQL.php');
  //weise den variablen die werte aus den Feldern zu
  $CREATEDATE = $_POST['CREATEDATE'];
  $NAME = $_POST['NAME'];
  $DESCRIPTION = $_POST['DESCRIPTION'];
  $FIRSTFLIGHT = $_POST['FIRSTFLIGHT'];
  $PICS = $_POST['PICS'];
  $BILD = $_POST['BILD'];
  $TAGS = $_POST['TAGS'];
  $PRIO = $_POST['PRIO'];
	
  //schreibe in die Raketen DB die werte an die angegebenen stellen	
  $stmt = $mysql->prepare("INSERT INTO `raketen`(`CREATEDATE`, `NAME`, `DESCRIPTION`, `FIRSTFLIGHT`, `PICS`, `BILD`, `TAGS`, `PRIO` )
	VALUES (:CREATEDATE, :NAME, :DESCRIPTION, :FIRSTFLIGHT, :PICS, :BILD, :TAGS, :PRIO)");
  
  //ersetze die Platzhalter durch die werte in den variablen
  $stmt->bindValue(':CREATEDATE', $CREATEDATE);
  $stmt->bindValue(':NAME', $NAME);
  $stmt->bindValue(':DESCRIPTION', $DESCRIPTION);
  $stmt->bindValue(':FIRSTFLIGHT', $FIRSTFLIGHT);
  $stmt->bindValue(':PICS', $PICS);
  $stmt->bindValue(':BILD', $BILD);
  $stmt->bindValue(':TAGS', $TAGS);
  $stmt->bindValue(':PRIO', $PRIO);
  //führe die abfrage aus und leite zurück an die INSERTpage
  $stmt->execute();
  header('Location: insertPage.php');
  die();
}
?>

<!--navigation-->
<?php include 'header.php' ?>
<div class="überschrift">
 <h5>Einfügen einer Rakete in die Datenbank</h5>
 <span>Für jedes mal drücken des Submit Buttons wird ein neuer Eintrag erstellt. Es ist nicht notwendig in jedes Feld etwas einzutragen. Bei einigen wird es<br></span>
 <span>verlangt. Zum ändern von Daten (auch nachträgliches hinzufügen eines Feldes) bitte die dafür <a href="UPDATEpage.php">vorgesehene Seite</a> verwenden!</span>
</div>
<br>
<div class="container containerüberschrift">
<form action="" method="post">
    <label>CREATEDATE: 
        <input type="date" name="CREATEDATE" id="CREATEDATE">
    </label>
    <label>NAME: 
        <input type="text" name="NAME" id="NAME" required>
    </label>
    <label>DESCRIPTION: 
        <input type="text" name="DESCRIPTION" id="DESCRIPTION">
    </label>
    <label>FIRSTFLIGHT: 
        <input type="date" name="FIRSTFLIGHT" id="FIRSTFLIGHT">
    </label>
    <label>PICS: 
        <input type="file" name="PICS" id="PICS">
    </label>
    <label>BILD: 
        <input type="text" name="BILD" id="BILD">
    </label>
    <label>TAGS: 
        <input type="text" name="TAGS" id="TAGS">
    </label>
    <label>PRIO: 
        <input type="text" name="PRIO" id="PRIO">
    </label>
<br>
	<input class="btn btn-success" type="submit" name="send" value="Rakete eintragen">
</form>
</div>
  </body>
</html>