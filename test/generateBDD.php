<?php
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=hearthstone','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('INSERT INTO allset(id, name, type, text, playerClass, mechanics, faction, rarity, health, collectible, cost, attack, flavor, artist, howToGetGold, howToGet, inPlayText, race, durability, elite) VALUES(:id, :name, :type, :text, :playerClass, :mechanics, :faction, :rarity, :health, :collectible, :cost, :attack, :flavor, :artist, :howToGetGold, :howToGet, :inPlayText, :race, :durability, :elite)');
?>

<html>
<meta http-equiv="Content-Type" content="text/html;charset=utf8" />
<head>
    <title>BDD Creation</title>
</head>
<body>
    <?php 
    $json = file_get_contents('AllSets.php'); 
    $allSet = json_decode($json,true); 
    echo '<pre>';
    foreach ($allSet as $category) {
        foreach($category as $entity)
        {
            $arr = array(
                'id' => $entity['id'],
                'name' => isset($entity['name']) ? $entity['name'] : NULL,
                'type' => isset($entity['type']) ? $entity['type'] : NULL,
                'text' => isset($entity['text']) ? $entity['text'] : NULL,
                'playerClass' => isset($entity['playerClass']) ? $entity['playerClass'] : NULL,
                'mechanics' => isset($entity['mechanics']) ? implode(",", $entity['mechanics']) : NULL,
                'faction' => isset($entity['faction']) ? $entity['faction'] : NULL,
                'rarity' => isset($entity['rarity']) ? $entity['rarity'] : NULL,
                'health' => isset($entity['health']) ? $entity['health'] : NULL,
                'collectible' => isset($entity['collectible']) ? $entity['collectible'] : false,
                'cost' => isset($entity['cost']) ? $entity['cost'] : NULL,
                'attack' => isset($entity['attack']) ? $entity['attack'] : NULL,
                'flavor' => isset($entity['flavor']) ? $entity['flavor'] : NULL,
                'artist' => isset($entity['artist']) ? $entity['artist'] : NULL,
                'howToGetGold' => isset($entity['howToGetGold']) ? $entity['howToGetGold'] : NULL,
                'howToGet' => isset($entity['howToGet']) ? $entity['howToGet'] : NULL,
                'inPlayText' => isset($entity['inPlayText']) ? $entity['inPlayText'] : NULL,
                'race' => isset($entity['race']) ? $entity['race'] : NULL,
                'durability' => isset($entity['durability']) ? $entity['durability'] : NULL,
                'elite' => isset($entity['elite']) ? $entity['elite'] : false
                );
            print_r($arr);
            $req->execute($arr);
        }
    }
    echo '</pre>';
   ?>
    </body>
</html>
