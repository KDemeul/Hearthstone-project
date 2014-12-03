<?php
// Function createListElement
function createListElement($card)
{
	echo '<tr>';
	echo '<td><form action="index.php" method="get">';
	echo '<input type="hidden" name="q" value="' . $_GET['q'] . '">';
	echo '<button type="submit" name="id" value="' . $card['id'] . '">' . $card['name'] .'</button>';
	echo '</form></td>';
	echo '<td>' . $card['type'] . '</td>' . "\n";
	echo '<td>' . $card['text'] . '</td>' . "\n";
	echo '<td>' . (($card['playerClass'] != 'Dream' and $card['playerClass'] != '') ? '<nobr><img src="Icons/' . $card['playerClass'] . '.jpg"/> ' : '<nobr> '). $card['playerClass'] . '</nobr></td>' . "\n";
	echo '<td>' .  (($card['rarity'] != 'Free' and $card['rarity'] != '')? '<nobr><img src="Icons/' . $card['rarity'] . '.png"/> ' : '<nobr> ') . $card['rarity'] . '</nobr></td>' . "\n";
	echo '<td>' .  ($card['health'] != '' ? '<nobr><img src="Icons/vie.png"/> ' : '<nobr> ') . $card['health'] . '</nobr></td>' . "\n";
	echo '<td>' .  ($card['cost'] != '' ? '<nobr><img src="Icons/mana.png"/> ' : '<nobr> ') . $card['cost'] . '</nobr></td>' . "\n";
	echo '<td>' .  ($card['attack'] != '' ? '<nobr><img src="Icons/attaque.png"/> ' : '<nobr> ') . $card['attack'] . '</nobr></td>' . "\n";
	echo '<td>' . $card['race'] . '</td>' . "\n";
	echo '</tr>';
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
?>


<?php 
if(isset($_GET['id'])){
	include('cardDisplayer.php');
}
?>

<!-- List Display -->
<?php 
// Create query for card

$card_query = $bdd->prepare('SELECT * FROM allset WHERE id = :key');

$querys = array(
	'id' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,id)>0'),
	'name' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,name)>0'),
	'type' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,type)>0'),
	'text' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,text)>0'),
	'playerClass' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,playerClass)>0'),
	'mechanics' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,mechanics)>0'),
	'faction' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,faction)>0'),
	'rarity' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,rarity)>0'),
	'health' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,health)>0'),
	'collectible' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,collectible)>0'),
	'cost' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,cost)>0'),
	'attack' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,attack)>0'),
	'flavor' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,flavor)>0'),
	'artist' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,artist)>0'),
	'howToGetGold' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,howToGetGold)>0'),
	'howToGet' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,howToGet)>0'),
	'inPlayText' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,inPlayText)>0'),
	'race' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,race)>0'),
	'durability' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,durability)>0'),
	'elite' => $bdd->prepare('SELECT * FROM allset WHERE LOCATE(:key,elite)>0')
	);

	?>

	<div class="content-list">
		<table class="table table-striped">
			<?php
			$key_words = explode(' ',$_GET['q']);
			$results = array();
			// Create array
			foreach ($querys as $query) {
				$query->execute(array('key' => $key_words[0]));
				while($card = $query->fetch()){
					$results[$card['id']] = -1;
				}
			}
			foreach ($key_words as $key) {
				foreach ($querys as $query) {
					$query->execute(array('key' => $key));
					while($card = $query->fetch()){
						if(array_key_exists($card['id'], $results)){
							$results[$card['id']] += 1;
						}
					}
				}
			}
			foreach(array_keys($results) as $card_id)
			{
				if($results[$card_id] >= sizeof($key_words)){	
					$card_query->execute(array('key' => $card_id));
					while($card = $card_query->fetch())
						createListElement($card);

				}
			}
			?>
		</table>

	</div>