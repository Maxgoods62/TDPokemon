<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pokeE20170146;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['type']) && $_GET['type'] != null) {
    $typerecherhe = htmlspecialchars($_GET['type']);

    $requete = 'SELECT * FROM pokemon WHERE (type1 LIKE "' . $typerecherhe . '") OR (type2 LIKE "' . $typerecherhe . '")';

    $reponse = $bdd->query($requete);

    $i = 0;
    while ($donnees = $reponse->fetch()) {

        $json = json_encode($donnees);
        echo $json;
        $i++;
    }
    if ($i == 0) {
        echo "<h2>Il n'y a pas de pokemon pour votre requete.</h2>";
    }

} else {
    echo "<h1>Vous devez specifier un type !</h1>";
}

?>