<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil de l'administration</title>
    <link rel="stylesheet" href="css/style.css">
    <!--Lien CSS bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Lien bootstrap-table-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
</head>

<body>
    <h1 class="text-center mt-4">Accueil admin</h1>

    <?php
    include "inc/navbar.php";
    ?>

    <div id="content">
        <h3 class="text-center mt-5">Datas</h3>
        <?php
        // datas est une chaîne de caractère : erreur SQL !
        if (is_string($datas)) :
        ?>
            <h3 id="alert"><?= $datas ?></h3>
        <?php
        // Pas encore de `geoloc`
        elseif (empty($datas)) :
        ?>
            <h3 id="comment">Pas encore de lieu.</h3>
        <?php
        // Nous avons des lieux
        else :
            // on compte le nombre de données 
            $nb = count($datas);
        ?>
            <!-- <h3>Il y a <?= $nb ?> <?= $nb > 1 ? "lieux" : "lieu" ?></h3>-->
            <section class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" data-toggle="table" data-show-columns="true" data-search="true" data-pagination="true" data-checkbox-header="true">
                                <thead>
                                    <tr>
                                        <th data-checkbox="true" data-click-to-select="true">Id</th>
                                        <th class="text-center">Titre</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Latitude</th>
                                        <th class="text-center">Longitude</th>
                                        <th class="text-center">Modifier</th>
                                        <th class="text-center">Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // tant qu'on a des données
                                    // var_dump($datas);

                                    foreach ($datas as $data) :
                                    ?>

                                        <tr>
                                            <td><?= $data['idgeoloc'] ?></td>
                                            <td><?= $data['title'] ?></td>
                                            <td><?= $data['geolocdesc'] ?></td>
                                            <td><?= $data['latitude'] ?></td>
                                            <td><?= $data['longitude'] ?></td>
                                            <td class="text-center"><a href="?update=<?= $data['idgeoloc'] ?>"><img src="../img/editIcone.png" alt="update" /></a></td>
                                            <td class="text-center"><a href="?delete=<?= $data['idgeoloc'] ?>"><img src="../img/deleteIcon.png" alt="delete" /></a></td>

                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Insérer cette balise "script" après celle de Bootstrap -->
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
</body>

</html>