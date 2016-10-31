<?php
	require_once("../../config.php");
	
	if(!isset($_SESSION)) { 
		session_start();
	} 
	
 
    if(empty($_SESSION["scann_result"])) {
      $_SESSION["scann_result"] = "";
    } 
	
	/*
		Parse paramenters
		------------------
	*/
	 
	if (isset($_GET["type"]) && $_GET["type"] == "update") {
		
		if ($_POST["updateRadio"] == "f"){
			update("films");	
		}
		
		if($_POST["updateRadio"] == "s"){
			update("series");
		}
		
	}

	if (isset($_GET["type"]) && $_GET["type"] == "scanfilm") {
		$dwn = "";
		if (isset($_POST["dwn"])) {
			$dwn = "-d";
		}
		
		scann("-f", $_POST["title"], $dwn);		
	}	

	if (isset($_GET["type"]) && $_GET["type"] == "scanserie") {
		$dwn = "";
		if (isset($_POST["dwn"])) {
			$dwn = "-d";
		}
		
		scann("-s", $_POST["title"], $dwn);		
	}
	
	if (isset($_GET["type"]) && $_GET["type"] == "createserie") {
		createSerie();
	}

	if (isset($_GET["type"]) && $_GET["type"] == "updateserie") {
		updateSerie();
	}
	
	if (isset($_GET["type"]) && $_GET["type"] == "createfilm") {
		createFilm();
	}

	if (isset($_GET["type"]) && $_GET["type"] == "updatefilm") {
		updateFilm();
	}

	if (isset($_GET["type"]) && $_GET["type"] == "deletefilm") {
		deleteFilm($_GET["id"]);
	}
	
	// Update db contents
	function update($type) {
		shell_exec(getPathScanner() . " -" . $type);

		$_SESSION["scann_result"] = "Last script runned (" . date("d-m-Y H:i:s", time()) ."): \n\n";
		$_SESSION["scann_result"] = $_SESSION["scann_result"] . " > " . $type . " Updated!";
		
		header("Location: ../index.php");
		die();
		
	}
	
	// Scann content
	function scann($type, $title, $dwn) {	
		$result = shell_exec(getPathScanner() . " " . $type . " " . $title ." -v" . " " . $dwn);	
		
		$_SESSION["scann_result"] = "Last script runned (" . date("d-m-Y H:i:s", time()) ."): \n\n";
		$_SESSION["scann_result"] = $_SESSION["scann_result"] . $result;
			
		header("Location: ../index.php");
		die();
	}

	// create serie
	function createSerie() {
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		$lastaEpisode = "'".$_POST["lastepisode"]."'";
		
		$notify = 0;
		if (isset($_POST["notify"])) {
			$notify = 1;	
		}
		
		$download = 0;
		if (isset($_POST["download"])) {
			$download = 1;	
		}
		
		$query = "insert into serie (name, search, lastEpisode, notify, download) values(".$title.", ".$search.", ".$lastaEpisode.", ".$notify.", ".$download.");";
		
		$db = new SQLite3(getDataBaseLocation());
		$db->exec($query);

		$db->close();
		
		header("Location: ../series.php");
		die();
	}
	
	// update serie
	function updateSerie() {
		$id = $_POST["id"];
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		$lastaEpisode = "'".$_POST["lastepisode"]."'";
		
		$notify = 0;
		if (isset($_POST["notify"])) {
			$notify = 1;	
		}
		
		$download = 0;
		if (isset($_POST["download"])) {
			$download = 1;	
		}
		
		$query = "update serie set name = ".$title.", search = ".$search.", lastEpisode = " .$lastaEpisode.", notify = ".$notify.", download = ".$download." where id = ".$id;
				
		$db = new SQLite3(getDataBaseLocation());
		$db->exec($query);

		$db->close();
		
		header("Location: ../series.php");
		die();
	}

	// create film
	function createFilm() {
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		
		$notify = 0;
		if (isset($_POST["notify"])) {
			$notify = 1;	
		}
		
		$query = "insert into film (name, search, notify, active) values(".$title.", ".$search.", ".$notify.", 1);";
		
		$db = new SQLite3(getDataBaseLocation());
		$db->exec($query);

		$db->close();
		
		header("Location: ../films.php");
		die();
	}
	
	// update film
	function updateFilm() {
		$id = $_POST["id"];
		$title = "'".$_POST["title"]."'";
		$search = "'".$_POST["search"]."'";
		$results = $_POST["results"];
				
		$query = "update film set name = ".$title.", search = ".$search.", results = " .$results." where id = ".$id;
				
		$db = new SQLite3(getDataBaseLocation());
		$db->exec($query);

		$db->close();
		
		header("Location: ../films.php");
		die();
	}
	
	// delete film
	function deleteFilm($film) {
		$query = "delete from film where id = ".$film;
				
		$db = new SQLite3(getDataBaseLocation());
		$db->exec($query);

		$db->close();
		
		header("Location: ../films.php");
		die();
	}
	

	
	// get serie
	function getSerie($id) {
		$query = "select * from serie where id = " . $id;
		
		$db = new SQLite3(getDataBaseLocation());
		$results = $db->query($query);
		
		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){ 
          array_push($data, $row);
        } 

		$db->close();
		return $data[0];
	}

	// get film
	function getFilm($id) {
		$query = "select * from film where id = " . $id;
		
		$db = new SQLite3(getDataBaseLocation());
		$results = $db->query($query);
		
		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){ 
          array_push($data, $row);
        } 

		$db->close();
		return $data[0];
	}	
	
	// get all series from database
	function getSeriesFromDataBase() {
		$query = "select * from serie";
		
		$db = new SQLite3(getDataBaseLocation());
		$results = $db->query($query);
		
		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){ 
          array_push($data, $row);
        } 

		$db->close();
		return $data;
	}
	
	// get all films from database
	function getFilmsFromDataBase() {
		$query = "select * from film";
				
		$db = new SQLite3(getDataBaseLocation());
		$results = $db->query($query);
		
		$data = array();
        while($row = $results->fetchArray(SQLITE3_ASSOC)){ 
          array_push($data, $row);
        } 

		$db->close();
		return $data;
	}	
?>