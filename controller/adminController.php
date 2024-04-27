<?php

// si on veut se déconnecter

if (isset($_GET['disconnect'])) {
    // on se déconnecte
    disconnectAdministrator();
    header("Location: ./");
    exit();
}

//Si on veut créer un lieu
if (isset($_GET['create'])) {

    //Si on a cliqué sur insérer
    if (isset(
        $_POST['title'],
        $_POST['geolocdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )) {
        $title = htmlspecialchars(strip_tags(trim($_POST['title'])), ENT_QUOTES);
        $geolocdesc = htmlspecialchars(trim($_POST['geolocdesc']), ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        $insert = insertOneGeolocById($db, $title, $geolocdesc, $latitude, $longitude);

        if ($insert === true) {
            header("Location: ./");
            exit();
        }
    }

    //chargement de la vue
    include "../view/admin/admin.insert.view.html.php";
    exit();
}

// si on a cliqué sur supprimer un lieu
if (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {

    //conversion en int
    $idDelete = (int) $_GET['delete'];


    // si on a validé la suppression
    if (isset($_GET['ok'])) {
        $delete = deleteOneGeolocById($db, $idDelete);
        if ($delete === true) {
            header("Location: ./");
            exit();
        } elseif ($delete === false) {
            $error = "Problème avec cette suppression";
        } else {
            $error = $delete;
        }
    }

    // chargement de l'article pour la suppression
    $getOneGeoloc = getOneGeolocById($db, $idDelete);

    //chargement de la vue
    include "../view/admin/admin.delete.view.html.php";
    exit();
}


//si on a cliqué sur update et qu'on'accepte que les chiffres dans le string ['update']
if (isset($_GET['update']) && ctype_digit($_GET['update'])) {
    //conversion en int
    $idUpdate = (int) $_GET['update'];

    //Si on a modifier le formulaire (pas obligatoire de vérifier tous les champs, mais dans le isset, la virgule vaut &&)
    if (isset(
        $_POST['title'],
        $_POST['geolocdesc'],
        $_POST['latitude'],
        $_POST['longitude']
    )) {
        // vérification de valeurs
        $idgeoloc = $idUpdate;
        $title  = htmlspecialchars(strip_tags(trim($_POST['title'])), ENT_QUOTES);
        $geolocdesc  = htmlspecialchars(trim($_POST['geolocdesc']), ENT_QUOTES);
        $latitude = (float) $_POST['latitude'];
        $longitude = (float) $_POST['longitude'];

        //fonction qui update la mise à jour
        $update =  updateOneGeolocByID($db, $idgeoloc, $title, $geolocdesc, $latitude, $longitude);
        //var_dump($update);

        //Si l'update est bon
        if ($update === true) {
            header("Location: ./");
            exit();
        } elseif ($update === false) {
            $errorUpdate = "Cet article n'a pas été modifié";
        } else {
            $errorUpdate = $update;
        }
    }
    //Chargement de l'article pour l'update
    $getOneGeoloc = getOneGeolocByID($db, $idUpdate);
    // var_dump($getOneGeoLoc);

    //chargement de la vue
    include "../view/admin/admin.update.view.html.php";
    exit();
}



// si on est sur l'accueil chargement de tous les `geoloc`
$datas = getAllGeoloc($db);
// appel de la vue de l'accueil de l'admin
include "../view/admin/admin.homepage.view.html.php";
