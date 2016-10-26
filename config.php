<?php	
	/*
		Configuration paramenters
		-------------------------
	*/
	
	// URL to search content
	function getUrlBaseToSearch() {
		return "http://www.elitetorrent.net/resultados/";
	}
	
	// URL to search content by page
	function getUrlBaseToSearchByPage() {
		return "/pag:";
	}
	
	// URL to download files
	function getUrlToDownloadFile() {
		return "http://www.elitetorrent.net/get-torrent/";
	}
	
	// Database file
	function getDataBaseLocation() {
		return "db/torrents.db";
	}
	
	// Push script location
	function getPushScriptLocation() {
		return "./push.sh ";
	}
	
	// Download output directory
	function getDownloadOutputDirectory() {
		return "/server/.watch/";
	}

	// Log directory
	function getLogPath() {
		return "/server/scanner/logs/";
	}	
	
?>