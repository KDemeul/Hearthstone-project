<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="Images/logo.png" id="tiny-logo"></a>
		</div>
		<form class="navbar-form navbar-left" action="index.php" method="get">
			<div class="form-group">
				<?php echo '<input type="text" class="form-control"  name="q" value="' . $_GET['q'] . '">';?>
				<button type="submit" class="btn btn-default" >Go!</button>
			</div>
		</form>
	</div>
</nav>