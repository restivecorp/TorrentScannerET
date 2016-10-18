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
						<h2 class="page-title">Scanner Scripts</h2>
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">Run Scripts to Scan</div>
					<div class="panel-body">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingHelp">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseHelp" aria-expanded=	"true" ria-controls="collapseHelp">		
											Help
										</a>
									</h4>
								  
								</div>
								
								<div id="collapseHelp" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingHelp">
									<div class="panel-body">
										<p>
											<strong>Massive Scanner</strong><br />
											Allows erun the script for scann all movies or series database.
										</p>

										<p>
											<strong>Films Scanner</strong><br />
											Lets you run the script to find the torrents of a film.
										</p>
										
										<p>
											<strong>Serie Scanner</strong><br />
											Lets you run the script to find the torrents of a series.
										</p>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingMassive">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMassive" aria-expanded="false" aria-controls="collapseMassive">
										  Massive Scanner
										</a>
									</h4>
								  
								</div>
								
								<div id="collapseMassive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingMassive">
									<div class="panel-body">
										<form method="post" action="php/web.php?type=update" class="form-horizontal">
											
											<div class="form-group">
												<label class="col-sm-2 control-label">Select Script
													<br>
												</label>
												<div class="col-sm-10">
													<div class="radio radio-success radio-inline">
														<input type="radio" id="inlineRadio1" value="f" name="updateRadio">
														<label for="inlineRadio1"> Update Films </label>
													</div>
													<div class="radio radio-success radio-inline">
														<input type="radio" id="inlineRadio2" value="s" name="updateRadio">
														<label for="inlineRadio2"> Update Series </label>
													</div>
												</div>
											</div>

											<div class="hr-dashed"></div>
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-primary" type="submit">Run the script</button>
												</div>
											</div>

										</form>										
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingFilm">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFilm" aria-expanded="false" aria-controls="collapseFilm">
										  Films Scanner
										</a>
										</h4>
									</div>
										
									<div id="collapseFilm" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFilm">
										<div class="panel-body">
											<form method="post" action="php/web.php?type=scanfilm" class="form-horizontal">

												<div class="form-group">
													<label class="col-sm-2 control-label">Film Title</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="title" required>
														<span class="help-block m-b-none">
															Type the title of the film to find. Replace spaces by +
														</span> 
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-2 control-label">Options</label>
													<div class="col-sm-10">
														<div class="checkbox checkbox-success">
															<input id="dwnfilms" type="checkbox" name="dwn">
															<label for="dwnfilms">
																Download all results?
															</label>
														</div>
													</div>
												</div>

												<div class="hr-dashed"></div>
												
												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-primary" type="submit">Run the script</button>
													</div>
												</div>
												
											</form>
										</div>
									</div>
							</div>
									
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="headingSerie">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSerie" aria-expanded="false" aria-controls="collapseSerie">
										  Series Scanner
										</a>
									</h4>
								  
								</div>
								
								<div id="collapseSerie" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSerie">
									<div class="panel-body">
											<form method="post" action="php/web.php?type=scanserie" class="form-horizontal">

												<div class="form-group">
													<label class="col-sm-2 control-label">Film Title</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" name="title" required>
														<span class="help-block m-b-none">
															Type the title of the series to find. Replace spaces by +
														</span> 
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-2 control-label">Options</label>
													<div class="col-sm-10">
														<div class="checkbox checkbox-success">
															<input id="dwnseries" type="checkbox" name="dwn">
															<label for="dwnseries">
																Download all results?
															</label>
														</div>
													</div>
												</div>

												<div class="hr-dashed"></div>
												
												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn btn-primary" type="submit">Run the script</button>
													</div>
												</div>
												
											</form>										
									</div>
								</div>
							</div>
							
						</div><!-- pannel group --> 
					</div> <!-- pannel body-->
				</div> <!-- pannel -->
	
	
				<div class="panel panel-default">
					<div class="panel-heading">Scripts results</div>
					<div class="panel-body">
						<pre>
<?php
print_r($_SESSION["scann_result"]);
?>
						</pre>
					</div>
				</div>
					
			</div>
		</div>
	</div>


	<?php require_once('partials/footer.php'); ?> 

</body>

</html>