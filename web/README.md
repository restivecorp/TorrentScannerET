# TorrentScannerET
PHP scraping to search torrents in a Web Portal (ET)

## What is?
Web interface for php scanner script
The application template is 'Harmony Admin': http://themestruck.com/theme/harmony-admin/

## Configure
Edit this funtions to set correct paths (php/web):
 * getPathScanner (){ ... } // Full path to php scanner.php script
 * getDataBaseLocation () { ... } // Full path to database

## Usage
Copy files into web server:
```sh
	+ scanner
		+ db
			- torrents.db
		+ web
			+ css
			+ js
			+ *.php
```

Open brwoser to URL: http://YOUR_IP/scanner/web/


## Screenshots
![alt tag](https://github.com/ruboweb/TorrentScannerET/blob/master/web/screenshots/1.png)
![alt tag](https://github.com/ruboweb/TorrentScannerET/blob/master/web/screenshots/2.png)
![alt tag](https://github.com/ruboweb/TorrentScannerET/blob/master/web/screenshots/3.png)
