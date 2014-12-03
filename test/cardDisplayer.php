<?php

function createCard($card)
{
	include('cardDisplayerTemplate.php');
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

	$card_query->execute(array('id'=>$id));
	$card = $card_query->fetch();
	createCard($card);
}
