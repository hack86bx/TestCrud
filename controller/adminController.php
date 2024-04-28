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

    /*Si on a cliqué sur insérer et Si on veut créer un lieu :
    On récupère les données du formulaire
    On insère les données dans la base de données
    Si l'insertion réussit, on redirige vers la page d'accueil*/
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


   /* isset() : Cette fonction vérifie si une ou plusieurs variables sont définies et non nulles, elle vérifie si les variables $_POST['title'], $_POST['geolocdesc'], $_POST['latitude'] et $_POST['longitude'] existent et ont une valeur.
$_POST : C’est un tableau associatif en PHP qui contient les données envoyées par un formulaire HTML via la méthode POST.Vous récupérez les valeurs des champs de formulaire nommés title, geolocdesc, latitude et longitude.

htmlspecialchars() : Cette fonction convertit les caractères spéciaux en entités HTML. Elle est utilisée ici pour sécuriser les données entrées par l’utilisateur et éviter les attaques XSS (cross-site scripting). 
Par exemple, si l’utilisateur entre <script>alert('Hello');</script>, cette fonction le convertira en &lt;script&gt;alert('Hello');&lt;/script&gt;.

strip_tags() : Cette fonction supprime toutes les balises HTML et PHP d’une chaîne de caractères. Elle est utilisée ici pour s’assurer que les valeurs des champs ne contiennent pas de balises potentiellement dangereuses.
Conversion en nombre flottant : Les variables $latitude et $longitude sont converties en nombres flottants (décimaux) à l’aide de (float) pour s’assurer qu’elles contiennent des valeurs numériques.
Insertion dans la base de données : Enfin, les valeurs nettoyées et converties sont utilisées pour insérer un enregistrement dans la base de données à l’aide de la fonction insertOneGeolocById($db, $title, $geolocdesc, $latitude, $longitude). Si l’insertion réussit, l’utilisateur est redirigé vers la page d’accueil.*/

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
