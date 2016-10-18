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
					<div class="panel-heading">Edit Film</div>
					<div class="panel-body">
						<?php
							$s = getFilm($_GET["id"]);							
						?>
						<form method="post" action="php/web.php?type=updatefilm" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id" value="<?php echo $s['id'] ?>" readonly required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Film Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" value="<?php echo $s['name'] ?>" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Search Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="search" value="<?php echo $s['search'] ?>"required>
									<span class="help-block m-b-none">
										Type the title of the film to find. Replace spaces by +
									</span> 
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Results</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="results" value="<?php echo $s['results'] ?>" required>
									<span class="help-block m-b-none">
										Number of results
									</span> 
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Notify</label>
								<div class="col-sm-10">
									<div class="checkbox checkbox-success">
										<input id="notify" type="checkbox" <?php if($s['notify']) echo "checked"; ?> name="notify">
										<label for="dwnfilms">
											Notify when find new episode?
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Active</label>
								<div class="col-sm-10">
									<div class="checkbox checkbox-success">
										
										<input id="download" type="checkbox" <?php if($s['active']) echo "checked"; ?> name="active">
										<label for="active">
											Active film scanner?
										</label>
									</div>
								</div>
							</div>
							
							<div class="hr-dashed"></div>
							
							<div class="form-group">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn btn-primary" type="submit">Update</button>
								</div>
							</div>
	
						</form>	
					</div> 
				</div> 
			</div>
		</div>
	</div>


	<?php require_once('partials/footer.php'); ?> 

</body>

</html>