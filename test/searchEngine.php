<?php
// Create BDD
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hearthstone','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

if(!isset($_GET['q']) or $_GET['q'] == ''){
	?>
	<div class="input-group input-group-lg" id="search-field">
		<div id="search-pic">
			<img src="Images/logo.png" alt="...">
		</div>
		<div>
			<form action="index.php" method="get">
				<input type="text" class="form-control" name="q">
				<span class="input-group-btn">
					<input type="submit" class="btn btn-default" value="Go!"/>
				</span>
			</form>
		</div>
	</div>
	<?php
	if(isset($_GET['q']) && $_GET['q'] == '')
	{
	?>
		<div class="alert alert-warning" role="alert">You should put <em> something </em> inside the search bar...</div>
	<?php	
	}
	?>
<?php
} else {
	include('search-nav-bar.php');
	include('search-results.php');
}
?>