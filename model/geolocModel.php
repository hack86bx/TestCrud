<?php

// Fonction qui récupère tous les champs de `geoloc`
function getAllGeoloc(PDO $connection): array|string
{
    $sql = "SELECT * FROM `geoloc`";
    try {
        $query = $connection->query($sql);

        // Si il n'y a pas de résultat, fetchAll sera un tableau vide
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

// Fonction qui charge tous les champs d'un élément de geoloc grâce à on idgeoloc
// Renvoie false en cas d'échec ou un message d'erreur sql
// Renvoie un tableau associatif si true

function getOneGeolocById(PDO $db, int $id): string|bool|array
{
    $sql = "SELECT * FROM `geoloc` WHERE `idgeoloc` = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam("id", $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        if ($stmt->rowCount() === 0) return false;
        $results = $stmt->fetch();
        $stmt->closeCursor();
        return $results;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


// Fonction qui  update tous les champs d'un élément de geoloc grâce à son idgeoloc
// En lui passant TOUTES les variables en paramètre
// nous renvoie false en cas d'échec ou le message d'erreur sql
// ou un true en cas de succès

function updateOneGeolocById(PDO $db, int $idgeoloc, string $title, string $desc, float $lat, float $lon): string|bool
{
    $sql = "UPDATE `geoloc` SET `title`= ? , `geolocdesc`= ?, `latitude`= ?, `longitude`= ? WHERE `idgeoloc`= ?";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([
            $title,
            $desc,
            $lat,
            $lon,
            $idgeoloc
        ]);
        // pas de modification par la requête
        if ($stmt->rowCount() === 0) return false;

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}

//Fonction qui insére un nouveau lieu

function insertOneGeolocById(PDO $db, string $title, string $desc, float $lat, float $lon): bool|string
{
    $sql = "INSERT INTO `geoloc` (`title`,`geolocdesc`,`latitude`,`longitude`) VALUES (?,?,?,?);";
    $prepare = $db->prepare($sql);
    try {
        $prepare->execute([
            $title,
            $desc,
            $lat,
            $lon
        ]);

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


//Fonction qui supprime un lieu

function deleteOneGeolocById(PDO $db, int $id): bool|string
{
    $sql = "DELETE FROM `geoloc` WHERE `idgeoloc` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);

    try {
        $stmt->execute();
        if ($stmt->rowCount() === 0) return false;

        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
