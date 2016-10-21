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
						<h2 class="page-title">Films</h2>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">List of Films</div>
					<div class="panel-body">
						<p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
								Create new Film to scan
							</button>
						</p>
						<div class="table-responsive">
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Search</th>
										<th>Results</th>
										<th>Notify</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$url = getUrlBaseToSearch();
										$films = getFilmsFromDataBase();
										
										foreach ($films as $f){
											if ($f['active'] == 1) {
												echo "<tr>";	
											} else {
												echo "<tr class=\"danger\">";		
											}																				
												echo "<td>". $f['name'] ."</td>";
												echo "<td><a href=\"" . $url . $f['search'] ."\" target=\"_blank\" >[+]</a> ". $f['search'] ." </td>";
												echo "<td>". $f['results'] ."</td>";
												
												if ($f['notify'] == 1) {
													echo "<td>Yes</td>";
												} else {
													echo "<td>No</td>";
												}
												
												if ($f['active'] == 1) {
													echo "<td>Active</td>";
												} else {
													echo "<td>Disabled</td>";
												}
												
												echo "<td><a href=\"editfilm.php?id=".$f['id']."\">Edit</a></td>";											
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
					<h4 class="modal-title" id="myModalLabel">Create Film</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="php/web.php?type=createfilm" class="form-horizontal">

						<div class="form-group">
							<label class="col-sm-2 control-label">Film Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Search Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="search" required>
								<span class="help-block m-b-none">
									Type the title of the film to find. Replace spaces by +
								</span> 
							</div>
						</div>
												
						<div class="form-group">
							<label class="col-sm-2 control-label">Notify</label>
							<div class="col-sm-10">
								<div class="checkbox checkbox-success">
									<input id="notify" type="checkbox" name="notify">
									<label for="dwnfilms">
										Notify when find new results?
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