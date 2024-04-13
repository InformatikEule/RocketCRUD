<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: main.php");
  exit;
}
if(isset($_POST['update'])){
  include_once('mySQL.php');
  $ID = $_POST['ID'];
  $CREATEDATE = $_POST['CREATEDATE'];
  $NAME = $_POST['NAME'];
  $DESCRIPTION = $_POST['DESCRIPTION'];
  $FIRSTFLIGHT = $_POST['FIRSTFLIGHT'];
  $PICS = $_POST['PICS'];
  $BILD = $_POST['BILD'];
  $TAGS = $_POST['TAGS'];
  $PRIO = $_POST['PRIO'];

  $stmt = $mysql->prepare("UPDATE `raketen` SET `ID`=':ID', `CREATEDATE`=':CREATEDATE', `NAME`=':NAME', 
  `DESCRIPTION`=':DESCRIPTION', `FIRSTFLIGHT`=':FIRSTFLIGHT', `PICS`=':PICS', `BILD`=':BILD', `TAGS`=':TAGS', `PRIO`=':PRIO' WHERE `ID`= ':ID'"); 

  $stmt->bindParam(':ID', $ID);
  $stmt->bindParam(':CREATEDATE', $CREATEDATE);
  $stmt->bindParam(':NAME', $NAME);
  $stmt->bindParam(':DESCRIPTION', $DESCRIPTION);
  $stmt->bindParam(':FIRSTFLIGHT', $FIRSTFLIGHT);
  $stmt->bindParam(':PICS', $PICS);
  $stmt->bindParam(':BILD', $BILD);
  $stmt->bindParam(':TAGS', $TAGS);
  $stmt->bindParam(':PRIO', $PRIO);
  $stmt->execute();
  header('Location: updatePage.php');
  die();

var_dump($stmt);
}

//wenn eine POST methode von "delete" ausgeführt wird
if(isset($_POST['delete'])){
  include_once('mySQL.php');
  $ID = $_POST['ID'];
  //löschen den eintrag in der DB welcher die selbe ID hat	
  $stmt = $mysql->prepare("DELETE FROM `raketen` WHERE `ID`='$ID'");
  //$stmt->bind_param(':IDdel', $IDdel);
  $stmt->execute();
  header('Location: updatePage.php');
  die();
}
 ?>

<!--navigation-->
<?php include 'header.php' ?>
<div class="überschrift">
 <h5>Bearbeiten einer vorhandenen Rakete in der Datenbank</h5>
 <span>Gib die ID des zu bearbeitenden Eintrags an und trage die Daten ein die du möchtest. Wenn du fertig bist klicke auf den Button.<br></span>
</div>
<br>
<!-- Update Area -->
<div class="container containerüberschrift">
<form action="" method="post">
    <label>ID der zu bearbeitenden Rakete: 
        <input type="text" name="ID" id="ID">
    </label>
	<br>
    <label>CREATEDATE: 
        <input type="datetime-local" name="CREATEDATE" id="CREATEDATE">
    </label>
    <label>NAME: 
        <input type="text" name="NAME" id="NAME">
    </label>
    <label>DESCRIPTION: 
        <input type="text" name="DESCRIPTION" id="DESCRIPTION">
    </label>
    <label>FIRSTFLIGHT: 
        <input type="text" name="FIRSTFLIGHT" id="FIRSTFLIGHT">
    </label>
    <label>BILD: 
        <input type="text" name="BILD" id="BILD">
    </label>
    <label>TAGS: 
        <input type="text" name="TAGS" id="TAGS">
    </label>
    <label>PICS: 
        <input type="text" name="TAGS" id="TAGS">
    </label>
    <label>PRIO: 
        <input type="text" name="TAGS" id="TAGS">
    </label>
<br>
	<input class="btn btn-warning" type="submit" name="update" value="Rakete bearbeiten">
</form>
</div>

	<!--Delete Area-->
<br>
<br>
<div class="überschrift">
 <h5>Löschen einer vorhandenen Rakete aus der Datenbank</h5>
 <span>Gib die ID der Rakete ein die du löschen möchtest und klicke den DELETE button. Das Löschen ist dauerhaft! Vergewissere dich das du die richtige ID hast!<br></span>
</div>
<br>
<div class="container containerüberschrift">
<form action="" method="post">
    <label>ID der zu löschenden Rakete: 
        <input type="text" name="ID" id="ID">
    </label>
<br>
	<input class="btn btn-danger" type="submit" name="delete" value="Rakete löschen">
</form>
</div>
  </body>
</html>