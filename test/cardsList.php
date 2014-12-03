<?php
// Function createRowWithCard
function createRowWithCard($card)
{
	$res =  '<tr>';
	$res = $res . '<td><a href=index.php?id=' . $card['id'] . '>' . $card['name'] . '</a></td>';
	$res = $res . '<td>' . $card['type'] . '</td>';
	$res = $res . '<td>' . $card['text'] . '</td>';
	$res = $res . '<td>' . $card['playerClass'] . '</td>';
	$res = $res . '<td>' . $card['mechanics'] . '</td>';
	$res = $res . '<td>' . $card['faction'] . '</td>';
	$res = $res . '<td>' . $card['rarity'] . '</td>';
	$res = $res . '<td>' . $card['health'] . '</td>';
	$res = $res . '<td>' . $card['collectible'] . '</td>';
	$res = $res . '<td>' . $card['cost'] . '</td>';
	$res = $res . '<td>' . $card['attack'] . '</td>';
	$res = $res . '<td>' . $card['flavor'] . '</td>';
	$res = $res . '<td>' . $card['artist'] . '</td>';
	$res = $res . '<td>' . $card['howToGetGold'] . '</td>';
	$res = $res . '<td>' . $card['howToGet'] . '</td>';
	$res = $res . '<td>' . $card['inPlayText'] . '</td>';
	$res = $res . '<td>' . $card['race'] . '</td>';
	$res = $res . '<td>' . $card['durability'] . '</td>';
	$res = $res . '<td>' . $card['elite'] . '</td>';
	$res = $res . '</tr>';
	return $res;
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
// Create query for class
$card_query = $bdd->prepare('SELECT * FROM allset WHERE playerClass = :playerClass');

// Query for each class
$class_query = $bdd->query('SELECT DISTINCT playerClass FROM allset');

// Display card for each class
while($class = $class_query->fetch())
{
	echo '<h2>' . $class['playerClass'] . '</h2>';
	echo '<table>';
	$card_query->execute(array('playerClass' => $class['playerClass']));
	while ($card = $card_query->fetch())
	echo createRowWithCard($card);
	echo '</table>';
}

// Display card without class
echo '<h2>' . 'All class cards' . '</h2>';
echo '<table>';
$common_query = $bdd->query('SELECT * FROM allset WHERE playerClass IS NULL');
while ($card = $common_query->fetch())
{
	echo createRowWithCard($card);
}
echo '</table>';	

?>