<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="insertBody">
    <h1 class="text-center mt-4">Insertion d'un lieu</h1>
    <?php
    include "inc/navbar.php";
    ?>
    <div id="content">
        <h2 class="text-center mt-5">Ajoutez votre lieu</h2>
        <div class="container ">
            <div class="row  justify-content-center align-items-center">
                <form method="POST" name="geo" action="">
                    <div class="mb-3 mt-5">
                        <!-- <label for="titre" class=" form-label">Titre</label>-->
                        <input type=" text" name="title" placeholder="Titre" class="form-control w-25  mx-auto border shadow-lg" id="titre" required>
                    </div>
                    <div class="mb-3 ">
                        <!--  <label for="desc" class="form-label">Description</label>-->
                        <textarea name="geolocdesc" class="form-control w-25 mx-auto shadow-lg" id="desc" rows="3" placeholder="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <!--  <label for="latitude" class="form-label">Latitude</label>-->
                        <input type="number" placeholder="latitude" name="latitude" step="0.000000001" class="form-control w-25 mx-auto shadow-lg" id="latitude" required>
                    </div>
                    <div class="mb-3">
                        <!--  <label for="longitude" class="form-label">Longitude</label>-->
                        <input type="number" name="longitude" placeholder="longitude" step="0.000000001" class="form-control w-25 mx-auto shadow-lg" id="longitude" required>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" value="Insérer" class="btn btn-outline-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Lien JS Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>