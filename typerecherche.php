<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pokeE20170146;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

include_once ('header.php');


if (isset($_GET['type']) && $_GET['type'] != null) {

    $typerecherhe = htmlspecialchars($_GET['type']);
    ?>


    <div class="row">
        <div class="col-12">
            <h1>Voici les pokemons de type <?php echo $typerecherhe; ?></h1>
            <?php
            $requete = 'SELECT * FROM pokemon WHERE (type1 LIKE "' . $typerecherhe . '") OR (type2 LIKE "' . $typerecherhe . '")';

            $reponse = $bdd->query($requete);

            $i = 0;
            while ($donnees = $reponse->fetch()) {
                ?>
                <!-- bloc pokemon debut -->
                <div class="fiche-pokemon row">
                    <div class="photo-pokemon col-3">
                        <img src="<?php echo $donnees['urlimage']; ?>">
                    </div>
                    <div class="infos-pokemon col-9">
                        <h4><?php echo $donnees['nom']; ?></h4>
                        <div class="description-pokemon"><?php echo $donnees['description']; ?></div>
                    </div>
                </div>
                <?php
                $i++;
            }

            if ($i == 0) {
                echo '<h2> Pas de pokemon</h2>';
            }

            $reponse->closeCursor();

            ?>
        </div>
    </div>
    <?php
} else {
?>

    <div class="row">
        <div class="col-12">
            <h1>Erreur : veuillez rensignez un type</h1>
        </div>
    </div>
<?php
}
include_once ('footer.php');
?>