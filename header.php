<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/styles.css"/>
    <title>Raketen!</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
	  <a class="navbar-brand" href="main.php">
		<img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
		VAB(alle anzeigen)
	  </a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		  <li class="nav-item">
			<a class="nav-link" href="raketen.php">Raketen anzeigen</a>
		  </li>
          <li class="nav-item">
			<a class="nav-link" href="rover.php">Rover anzeigen</a>
		  </li>
          <li class="nav-item">
			<a class="nav-link" href="probes.php">Satelliten anzeigen</a>
		  </li>
          <li class="nav-item">
            <a class="nav-link" href="insertPage.php">Eintrag anlegen</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="updatePage.php">Eintrag bearbeiten/löschen</a>
		  </li>
		</ul>
      <form class="d-flex" action="search.php" method="POST">
        <input class="form-control me-2" type="text" name="btnkeyword" placeholder="Eintrag suchen" aria-label="Search">
        <button class="btn btn-outline-secondary" name="searchb" type="submit">Search</button>
      </form>
	  </div>
	</div>
  </nav>
<br>