<tr <?php echo $active ? ' class="info"' : ''; ?>>
  <td>
    <form action="index.php" method="get">
      <input type="hidden" name="q" value="<?php echo $_GET['q']; ?>">
      <button type="submit" name="id" value="<?php echo $card['id']; ?>" class="flatButton"> <?php echo$card['name']; ?></button>
    </form>
  </td>
  <td><?php echo $card['type']; ?></td>
  <td><?php echo $card['text']; ?></td>
  <td><?php echo (($card['playerClass'] != 'Dream' && $card['playerClass'] != '') ? '<nobr><img src="Icons/' . $card['playerClass'] . '.jpg"/> ' : '<nobr> '). $card['playerClass']; ?></nobr></td>
  <td><?php echo (($card['rarity'] != 'Free' && $card['rarity'] != '')? '<nobr><img src="Icons/' . $card['rarity'] . '.png"/> ' : '<nobr> ') . $card['rarity']; ?></nobr></td>
  <td><?php echo ($card['health'] != '' ? '<nobr><img src="Icons/vie.png"/> ' : '<nobr> ') . $card['health']; ?></nobr></td>
  <td><?php echo ($card['cost'] != '' ? '<nobr><img src="Icons/mana.png"/> ' : '<nobr> ') . $card['cost']; ?></nobr></td>
  <td><?php echo ($card['attack'] != '' ? '<nobr><img src="Icons/attaque.png"/> ' : '<nobr> ') . $card['attack']; ?></nobr></td>
  <td><?php echo $card['race']; ?></td>
</tr>
