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
?>


    <div class="row">
        <div class="col-3">
            <div class="lien-famille"><a href="">Famille 1</a></div>
            <div class="lien-famille"><a href="">Famille 2</a></div>
            <div class="lien-famille"><a href="">Famille 3</a></div>
        </div>
        <div class="col-9">
            <?php
            $reponse = $bdd->query('SELECT * FROM pokemon');
            while ($donnees = $reponse->fetch())
            {
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

            }

            $reponse->closeCursor();

            ?>
        </div>
    </div>
<?php

include_once ('footer.php');
?>