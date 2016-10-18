		<?php  
			function active($page){
				$filename = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
				
				if (strpos($filename, '/') !== FALSE ){
					$path = explode('/', $filename);
					$part = array_pop($path); 
				}
				
				if ($part == ""){
					$part = "index.php";
				}
				
				if ($page == $part) {

					return "open";
				}

				return "";
			}
		?>

		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label">Menu</li>
				<li class="<?php echo active("index.php") ?>"><a href="index.php"><i class="fa fa-cogs"></i> Scan</a></li>
				<li class="<?php echo active("films.php") ?>"><a href="films.php"><i class="fa fa-film"></i> Films</a></li>
				<li class="<?php echo active("series.php") ?>"><a href="series.php"><i class="fa fa-television"></i> Series</a></li>
			</ul>
		</nav>