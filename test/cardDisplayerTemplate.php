<div class="content">
  <div class="card">
    <div class="col-md-6">
      <img src='Pic/<?php echo $card['id']; ?>.png'>
    </div>
    <div class="col-md-6">
      <table class="table table-hover">
        <?php if($card['name'] != NULL) : ?>
          <tr><td class="myLabel"> Name </td><td><?php echo $card['name']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['type'] != NULL) : ?>
          <tr><td class="myLabel"> Type </td><td><?php echo $card['type']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['text'] != NULL) : ?>
          <tr><td class="myLabel"> Text </td><td><?php echo $card['text']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['playerClass'] != NULL) : ?>
          <tr><td class="myLabel"> Player Class </td><td>' . ($card['playerClass'] != 'Dream' ? '<img src="Icons/' . $card['playerClass']; ?>.jpg"/> ' : ' '). $card['playerClass']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['mechanics'] != NULL) : ?>
          <tr><td class="myLabel"> Mechanics </td><td><?php echo $card['mechanics']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['faction'] != NULL) : ?>
          <tr><td class="myLabel"> Faction </td><td><?php echo $card['faction']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['rarity'] != NULL) : ?>
          <tr><td class="myLabel"> Rarity </td><td><?php echo ($card['rarity'] != 'Free' ? '<img src="Icons/' . $card['rarity'] . '.png"/> ' : ' ') . $card['rarity']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['health'] != NULL) : ?>
          <tr><td class="myLabel"> Health </td><td><img src="Icons/vie.png"/> <?php echo $card['health']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['collectible'] != NULL) : ?>
          <tr><td class="myLabel"> Collectible </td><td><?php echo $card['collectible']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['cost'] != NULL) : ?>
          <tr><td class="myLabel"> Cost </td><td><img src="Icons/mana.png"/> <?php echo $card['cost']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['attack'] != NULL) : ?>
          <tr><td class="myLabel"> Attack </td><td><img src="Icons/attaque.png"/> <?php echo $card['attack']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['flavor'] != NULL) : ?>
          <tr><td class="myLabel"> Flavor </td><td><?php echo $card['flavor']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['artist'] != NULL) : ?>
          <tr><td class="myLabel"> Artist </td><td><?php echo $card['artist']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['howToGetGold'] != NULL) : ?>
          <tr><td class="myLabel"> How to get gold </td><td><?php echo $card['howToGetGold']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['howToGet'] != NULL) : ?>
          <tr><td class="myLabel"> How to get </td><td><?php echo $card['howToGet']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['inPlayText'] != NULL) : ?>
          <tr><td class="myLabel"> In play text </td><td><?php echo $card['inPlayText']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['race'] != NULL) : ?>
          <tr><td class="myLabel"> Race </td><td><?php echo $card['race']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['durability'] != NULL) : ?>
          <tr><td class="myLabel"> Durability </td><td><?php echo $card['durability']; ?></td></tr>
        <?php endif; ?>
        <?php if($card['elite'] != NULL) : ?>
          <tr><td class="myLabel"> Elite </td><td><?php echo $card['elite']; ?></td></tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
</div>
