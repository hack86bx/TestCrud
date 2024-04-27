<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4">Suppression lieu</h1>
    <?php
    include "inc/navbar.php";
    ?>
    <div id="content">
        <h3 class="text-center mt-5">Supprimer article</h3>

        <?php
        if (isset($error)) :
        ?>
            <h3 id="alert"><?= $error ?></h3>
        <?php
        endif;
        // datas est une chaîne de caractère : erreur SQL !
        if (is_string($getOneGeoloc)) :
        ?>
            <h3 id="alert"><?= $getOneGeoloc ?></h3>
        <?php
        // Pas de `geoloc` trouvée
        elseif ($getOneGeoloc === false) :
        ?>
            <h3 id="comment">Ce le lieu n'existe plus !</h3>
        <?php
        // Nous avons un lieu
        else :
        ?>
            <h5 class="text-center mt-5 mb-3">Titre : <span class="fw-normal"> <?= $getOneGeoloc['title'] ?></span></h5>
            <h5 class="text-center mb-3">Description : <span class="fw-normal"><?= $getOneGeoloc['geolocdesc'] ?></span></h5>
            <h5 class="text-center mb-3">Latitude : <span class="fw-normal"><?= $getOneGeoloc['latitude'] ?></span></h5>
            <h5 class="text-center mb-3">Longitude : <span class="fw-normal"><?= $getOneGeoloc['longitude'] ?></span></h5>
            <p class="text-center mt-2 fw-bold">Supprimer le lieu</p>
            <div class="text-center">
                <a href=" ?delete=<?= $idDelete ?>&ok"><button value="supprimer" class="btn btn-outline-danger btn-lg px-4 me-sm-3">supprimer</button></a><a href="./"><button value="Non" class="btn btn-outline-dark btn-lg px-4 me-sm-3">Ne pas supprimer</button></a>
            </div>

        <?php endif ?>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>