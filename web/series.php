<!doctype html>
<html lang="en" class="no-js">

<?php require_once('partials/header.php'); ?> 

<body>
	<?php require_once('partials/brand.php'); ?> 

	<div class="ts-main-content">
		<?php require_once('partials/nav.php'); ?> 

		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Series</h2>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">List of Series</div>
					<div class="panel-body">
						<p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								Create new Serie to scan
							</button>
						</p>
						<div class="table-responsive">
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Search</th>
										<th>Last Episode</th>
										<th>Notify</th>
										<th>Download</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$url = getUrlBaseToSearch();
										$series = getSeriesFromDataBase();
										
										foreach ($series as $s){
											if ($s['notify'] == 0 && $s['download'] == 0) {
												echo "<tr class=\"danger\">";		
											} else {
												echo "<tr>";	
											}	

											
												echo "<td>". $s['name'] ."</td>";
												echo "<td><a href=\"" . $url . $s['search'] ."\" target=\"_blank\" >[+]</a> ". $s['search'] ." </td>";
												echo "<td>". $s['lastEpisode'] ."</td>";
												
												if ($s['notify'] == 1) {
													echo "<td>Yes</td>";
												} else {
													echo "<td>No</td>";
												}
												
												if ($s['download'] == 1) {
													echo "<td>Yes</td>";
												} else {
													echo "<td>No</td>";
												}
												
												echo "<td>";
													echo "<a href=\"editserie.php?id=".$s['id']."\">Edit</a>";
													echo " | ";
													echo "<a href=\"php/web.php?type=deleteserie&id=".$s['id']."\">Delete</a>";
												echo "</td>";
												
											echo "</tr>";
										}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Create Serie</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="php/web.php?type=createserie" class="form-horizontal">

						<div class="form-group">
							<label class="col-sm-2 control-label">Serie Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Search Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="search" required>
								<span class="help-block m-b-none">
									Type the title of the serie to find. Replace spaces by +
								</span> 
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Last Episode</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="lastepisode" required>
								<span class="help-block m-b-none">
									Must be formatted as pattern [n]x[n][n] :: 1x01 or 2x30 or 1x19
								</span> 
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Notify</label>
							<div class="col-sm-10">
								<div class="checkbox checkbox-success">
									<input id="notify" type="checkbox" name="notify">
									<label for="notify">
										Notify when find new episode?
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Download</label>
							<div class="col-sm-10">
								<div class="checkbox checkbox-success">
									<input id="download" type="checkbox" name="download">
									<label for="download">
										Download when find new episode?
									</label>
								</div>
							</div>
						</div>
						
						<div class="hr-dashed"></div>
						
						<div class="form-group">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn btn-primary" type="submit">Create</button>
							</div>
						</div>
						
					</form>	
				</div>
			</div>
		</div>
	</div>
	
	<?php require_once('partials/footer.php'); ?> 
	
</body>

</html>