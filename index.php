<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=pokeE20170146;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/98/International_Pok%C3%A9mon_logo.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Infos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
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
    <footer>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid aperiam, architecto at consectetur, corporis ea facere illo ipsum laudantium, modi nemo nulla odio quos reprehenderit sed similique. Nam, nesciunt.
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>