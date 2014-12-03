<?php

function createCard($card)
{
	echo '<div class="card">';
				echo '<div class="col-md-6">';
					echo '<img src=\'Pic/' . $card['id'] . '.png\'>';
				echo '</div>';
				echo '<div class="col-md-6">';
					echo '<table class="table table-hover">';
						if($card['name'] != NULL)
							echo '<tr><td class="myLabel"> Name </td><td>' . $card['name'] . '</td></tr>' . "\n";
						if($card['type'] != NULL)
							echo '<tr><td class="myLabel"> Type </td><td>' . $card['type'] . '</td></tr>' . "\n";
						if($card['text'] != NULL)
							echo '<tr><td class="myLabel"> Text </td><td>' . $card['text'] . '</td></tr>' . "\n";
						if($card['playerClass'] != NULL)
							echo '<tr><td class="myLabel"> Player Class </td><td>' . ($card['playerClass'] != 'Dream' ? '<img src="Icons/' . $card['playerClass'] . '.jpg"/> ' : ' '). $card['playerClass'] . '</td></tr>' . "\n";
						if($card['mechanics'] != NULL)
							echo '<tr><td class="myLabel"> Mechanics </td><td>' . $card['mechanics'] . '</td></tr>' . "\n";
						if($card['faction'] != NULL)
							echo '<tr><td class="myLabel"> Faction </td><td>' . $card['faction'] . '</td></tr>' . "\n";
						if($card['rarity'] != NULL)
							echo '<tr><td class="myLabel"> Rarity </td><td>' .  ($card['rarity'] != 'Free' ? '<img src="Icons/' . $card['rarity'] . '.png"/> ' : ' ') . $card['rarity'] . '</td></tr>' . "\n";
						if($card['health'] != NULL)
							echo '<tr><td class="myLabel"> Health </td><td><img src="Icons/vie.png"/> ' . $card['health'] . '</td></tr>' . "\n";
						if($card['collectible'] != NULL)
							echo '<tr><td class="myLabel"> Collectible </td><td>' . $card['collectible'] . '</td></tr>' . "\n";
						if($card['cost'] != NULL)
							echo '<tr><td class="myLabel"> Cost </td><td><img src="Icons/mana.png"/> ' . $card['cost'] . '</td></tr>' . "\n";
						if($card['attack'] != NULL)
							echo '<tr><td class="myLabel"> Attack </td><td><img src="Icons/attaque.png"/> ' . $card['attack'] . '</td></tr>' . "\n";
						if($card['flavor'] != NULL)
							echo '<tr><td class="myLabel"> Flavor </td><td>' . $card['flavor'] . '</td></tr>' . "\n";
						if($card['artist'] != NULL)
							echo '<tr><td class="myLabel"> Artist </td><td>' . $card['artist'] . '</td></tr>' . "\n";
						if($card['howToGetGold'] != NULL)
							echo '<tr><td class="myLabel"> How to get gold </td><td>' . $card['howToGetGold'] . '</td></tr>' . "\n";
						if($card['howToGet'] != NULL)
							echo '<tr><td class="myLabel"> How to get </td><td>' . $card['howToGet'] . '</td></tr>' . "\n";
						if($card['inPlayText'] != NULL)
							echo '<tr><td class="myLabel"> In play text </td><td>' . $card['inPlayText'] . '</td></tr>' . "\n";
						if($card['race'] != NULL)
							echo '<tr><td class="myLabel"> Race </td><td>' . $card['race'] . '</td></tr>' . "\n";
						if($card['durability'] != NULL)
							echo '<tr><td class="myLabel"> Durability </td><td>' . $card['durability'] . '</td></tr>' . "\n";
						if($card['elite'] != NULL)
							echo '<tr><td class="myLabel"> Elite </td><td>' . $card['elite'] . '</td></tr>' . "\n";
					echo '</table>';
				echo '</div>';
			echo '</div>';
}

// Create BDD
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hearthstone','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
// Create query for card
$card_query = $bdd->prepare('SELECT * FROM allset WHERE id = :id');


if(!isset($_GET['id']))
{
	echo include('searchEngine.php');
}
else
{	
	$id = $_GET['id'];
	?>
	<!-- Card Display -->
	<div class="content">
		<?php
		$card_query->execute(array('id'=>$id));
		$card = $card_query->fetch();
		createCard($card);
		?>
	</div>
<?php
}
?>