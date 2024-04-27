<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Acceuil</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
               
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="?homepage">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="?json">API fomat JSON</a></li>
                        <li class="nav-item"><a class="nav-link" href="?connect">Connexion</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">Liste lieux</h1>
                            <p class="lead text-white-50 mb-4">Emrah Arpaci CF2000</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="?connect">Connexion</a>
               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="content">
        <h3 class="text-center mt-3">Liste de nos lieux</h3>
        <?php
        /*
        // datas est une chaine de caractère : erreur SQL ! 
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
            <h3>Il y a <?= $nb ?> <?= $nb > 1 ? "lieux" : "lieu" ?></h3>

            <?php
            // tant qu'on a des données
            // var_dump($datas);
            foreach ($datas as $data) :
            ?>
                <h4><?= $data['title'] ?></h4>
                <p><?= $data['geolocdesc'] ?></p>
                <p><?= $data['latitude'] ?> | <?= $data['longitude'] ?></p>
                <hr>
        <?php
            endforeach;
        endif;
        */

        ?>

        <div id="resultat">
            <div id="map"></div>
            <div id="liste"></div>
        </div>

    </div>
       
  
        <script src=" https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
    </script>

    <script src="../js/carteJSON.js"></script>
    
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
