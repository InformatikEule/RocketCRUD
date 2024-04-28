<?php 
session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
$divider = "  Priorität: ";
include 'header.php';
  //wenn der suchbutton über POST aufgerufen wurde
  if(isset($_POST['searchb'])){
	include_once('mySQL.php');
	$mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mysql->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	$mode = 'IN NATURAL LANGUAGE MODE';
	$query = filter_input(INPUT_POST, 'btnkeyword');
	
	
	$sql = "SELECT *
    FROM raketen 
	WHERE MATCH (TAGS) AGAINST(:searchQuery $mode)";


	$stmt = $mysql->prepare($sql);
	$stmt->execute([
	  ':searchQuery' => $query,
	]);
  }
?>
<!--<h3 style="color: white;">TODO: sql error:"cant find fulltext" sobald ich mehrere spaltennamen in die query schreibe</h3>-->
<div class="article-container">

<div class="container-fluid">
  <div class="row">

  <!-- FÜR JEDE: Rakete in der Datenbank: -->
  <?php foreach ($stmt as $rakete) : ?>
  <!-- lege die anzahl der Spalten fest und definiere die Karte -->
    <div class="col-sm-3">
	  <div class="card bg-dark border-danger text-white " style="display: inline-block; width: 28rem;">
		<!-- WENN: "PRIO" 5 ist: -->

		<?php if($rakete->PRIO == 5) :?>
		  <!-- setze die farbe des Headers auf rot -->
		  <div class="card-header text-center fs-4" style="background-color: red;"><?=$rakete->NAME?></div>
		<!-- SONST: gehste halt mehr richtung "nichtrot"! -->
		<?php elseif($rakete->PRIO == 4) :?>
		  <div class="card-header text-center fs-4" style="background-color: #ED1212;"><?=$rakete->NAME?></div>
		<?php elseif($rakete->PRIO == 3) :?>
		  <div class="card-header text-center fs-4" style="background-color: #D12E2E;"><?=$rakete->NAME?></div>
		<?php elseif($rakete->PRIO == 2) :?>
		  <div class="card-header text-center fs-4" style="background-color: #B64949;"><?=$rakete->NAME?></div>
		<?php elseif($rakete->PRIO == 1) :?>
		  <div class="card-header text-center fs-4" style="background-color: #9B6464;"><?=$rakete->NAME?></div>
		<?php else : ?>
		  <div class="card-header text-center fs-4" style="background-color: #212529;"><?=$rakete->NAME?></div>
		<?php endif ?>
                     <img class="card-img-top" src="pics/<?= $rakete->BILD?>" alt="Hallo">
			<div class="card-body" style="background-color:">
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">ID:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->ID; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Erstellt am:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->CREATEDATE; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Name:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->NAME; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Beschreibung:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->DESCRIPTION; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Erstflug:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->FIRSTFLIGHT; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Bild:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->BILD; ?></p>
			  <h5 class="card-title text-secondary text-center fs-5 m-0 p-0">Tags:</h5>
			  <p class="card-text fs-6 m-1 p-0 text-center"><?= $rakete->TAGS; ?></p>
			  <div class="card-footer">
			    <input class="btn btn-danger" type="submit" name="btndelete" value="Rakete löschen">
			    <input class="btn btn-warning" type="submit" name="btnupdate" value="Eintrag ändern">
			  </div>
			</div>
          </div>
        </div>
         <?php endforeach; ?>
      </div>

    </div>
  </body>
</html>