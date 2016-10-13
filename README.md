# TorrentScannerET
PHP scraping to search torrents in a Web Portal (ET)

## What is?
PHP script that allows the following actions
 - Search TV Serie. You can show all contents about that serie and download all torrent links
 - Search Film. You can show all contens about that film and download all torrent links
 - Monitorice TV Serie and notify and/or download when a new episode is available
 - Monitorice Film and notify when is available

## Configure
Edit this funtions to set correct paths:
 * function getPushScriptLocation() { ... } // push.sh stript (https://github.com/ruboweb/ShellScripting/)
 * function getDownloadOutputDirectory() { ... } // Path to download torrents files

Edit db/torrent.db to start monitoring the series and films.
```sh
$ sql3 torrent.db
```
For automatic dowloads yo can configure the script into cron trask.

## Usage
Type next command to show help about:
```sh
$ php scanner.php

Missin parameter:
Ussage: php scanner.php OPTION ... [TITLE]

 Options availables:

  Search Series:
  --------------
   $ -s TITLE : To search Serie with specific TITLE
            [-v] Enable verbose mode
            [-d] Download all detected torrents

  Search Films:
  -------------
   $ -f TITLE : To search Film with specific TITLE
            [-q] Quality mode on (!screener)
            [-v] Enable verbose mode
            [-d] Download all detected torrents

  Scan actions:
  -------------
   $ -films   : To scan enabled films stored in database
   $ -series  : To scan enabled series stored in database
```

It's important that when you search a serie or film, change spaces by the character plus. For example 'the big bang theory' would be the+big+bang+theory'


