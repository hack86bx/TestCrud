<?php

//appel des dépendances

require_once "../config.php";


// connexion à la DB 
try {
    // instanciation de notre connexion PDO
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
} catch (Exception $e) {
    die($e->getMessage());
}

//Afficher le résultat de la requête sous format JSON

echo json_encode(getLocations($db));

//fermeture connexion

$db = null;

function getLocations(PDO $db): array
{
    $sql = "SELECT * FROM geoloc ORDER BY idgeoloc ASC";
    $query = $db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->closeCursor();
    return $result;
}
