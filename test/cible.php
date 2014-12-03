<html>
    <meta charset="utf-8" />
<body>
<?php 
$mdp = 'kangourou';
if(isset($_POST['mdp']) AND $_POST['mdp'] == $mdp)
{
?>
    <h1> Voici les codes </h1>
    <p><strong> ABCD-EFGH </strong></p>
<?php
}
elseif(!isset($_POST['mdp']))
{
?>
    <p> Entrer le code d'accès </p>
    <form action="index.php" method="post">
        <input type="password" name="mdp" />
    </form>
<?php
}
else
{
?>
    <p> Mauvais mot de passe> </p>
<?php
}
?>
</body>
</html>