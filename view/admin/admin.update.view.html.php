<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update d'un article</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center mt-4">Update d'un article</h1>
    <?php
    include "inc/navbar.php";
    ?>
    <div id="content">
        <h3 class="text-center mt-5">Article à modifier</h3>
        <?php
        if (isset($errorUpdate)) :
        ?>
            <h3 id="alert"><?= $errorUpdate ?></h3>
        <?php
        endif;
        // datas est une chaine de caractère : erreur SQL !
        if (is_string($getOneGeoloc)) :
        ?>
            <h3 id="alert"><?= $getOneGeoloc ?></h3>
        <?php
        // Pas de `geoloc` trouvée
        elseif ($getOneGeoloc === false) :
        ?>
            <h3 id="comment">Vous n'avez pas modifié le lieu !</h3>
        <?php
        //Nous avons un lieu
        else :
        ?>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <form method="POST" name="geo" action="">
                        <div class="mb-3">
                            <label for="titre" class=" form-label">Titre</label>
                            <input type="text" name="title" value="<?= $getOneGeoloc['title'] ?>" class="form-control" id="titre" required>
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea name="geolocdesc" class="form-control" id="desc" rows="3"><?= $getOneGeoloc['geolocdesc'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" value="<?= $getOneGeoloc['latitude'] ?>" name="latitude" step="0.000000001" class="form-control" id="latitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" name="longitude" value="<?= $getOneGeoloc['longitude'] ?>" step="0.000000001" class="form-control" id="longitude" required>
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" value="Modifier" class="btn btn-outline-success">
                        </div>
                    </form>
                </div>
            </div>

        <?php endif ?>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>