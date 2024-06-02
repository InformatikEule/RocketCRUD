<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
$divider = "  Priorität: ";
include_once('mySQL.php');
		  //Hole alle Raketen aus der DB, sortiere sie absteigend nach der Priorität
          $stmt = $mysql->prepare(
          "SELECT * FROM raketen ORDER BY PRIO DESC");
          $stmt->execute();
          $raketen = $stmt->fetchAll();
          
//if(isset($_POST['btnsound'])){
//}

//wenn eine POST methode von "delete" ausgeführt wird
if(isset($_POST['btnDelete'])){
  include_once('mySQL.php');
  $ID = $_POST['ID'];
  //löschen den eintrag in der DB welcher die selbe ID hat	
  $stmt = $mysql->prepare("DELETE FROM `raketen` WHERE `ID`='$ID'");
  //$stmt->bind_param(':IDdel', $IDdel);
  $stmt->execute();
  header('Location: main.php');
  die();
}
 ?>


<!--einfügen des Headers. --> 
<?php include 'header.php' ?>
<div class="container-fluid">
  <div class="row">


  <!-- FÜR JEDE: Rakete in der Datenbank: -->
  <?php foreach ($raketen as $rakete) : ?>
  <!-- lege die anzahl der Spalten fest und definiere die Karte -->
    <div class="col-sm-3">
	  <div class="card bg-dark border-danger text-white " style="display: inline-block; width: 28rem;">
		<!-- WENN: "PRIO" 5 ist: -->
		<?php if($rakete['PRIO'] == 5) :?>
		  <!-- setze die farbe des Headers auf rot füge Name und Priorität mit einem echt TOLL gelöstem trenner ein -->
		  <div class="card-header text-center fs-4" style="background-color: red;"><?php echo$rakete['NAME']?></div>
		<!-- SONST: gehste halt mehr richtung "nichtrot"! -->
		<?php elseif($rakete['PRIO'] == 4) :?>
		  <div class="card-header text-center fs-4" style="background-color: #ED1212;"><?php echo$rakete['NAME']?></div>
		<?php elseif($rakete['PRIO'] == 3) :?>
		  <div class="card-header text-center fs-4" style="background-color: #D12E2E;"><?php echo$rakete['NAME']?></div>
		<?php elseif($rakete['PRIO'] == 2) :?>
		  <div class="card-header text-center fs-4" style="background-color: #B64949;"><?php echo$rakete['NAME']?></div>
		<?php elseif($rakete['PRIO'] == 1) :?>
		  <div class="card-header text-center fs-4" style="background-color: #9B6464;"><?php echo$rakete['NAME']?></div>
		<?php else : ?>
		  <div class="card-header text-center fs-4" style="background-color: #212529;"><?php echo$rakete['NAME']?></div>
		<?php endif ?>
                  <img class="card-img-top" src="pics/<?= $rakete['BILD']?>" alt="Hier sollte das Bild einer Rakete sein! sadface.jpg">
			<div class="card-body" style="background-color:">
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">ID:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['ID']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Erstellt am:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['CREATEDATE']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Name:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['NAME']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Beschreibung:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['DESCRIPTION']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Erstflug:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['FIRSTFLIGHT']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Bild:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['BILD'] . "  "; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Tags:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['TAGS']; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Priorität:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?php echo $rakete['PRIO']; ?></p>4

			  <div class="card-footer">
			  <form action="" method="post">
			    <input class="btn btn-danger" type="submit" name="btnDelete" value="Rakete löschen">
			    <input class="btn btn-warning" type="submit" name="btnupdatesp" value="Eintrag bearbeiten">
			  </form>	
			  </div>
			</div>
          </div>
        </div>
         <?php endforeach; ?>
      </div>

    </div>
  </body>
</html>
