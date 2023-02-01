<?php
function get_animalTypes() {
    global $db;
    $query = 'SELECT * FROM animaltypes
              ORDER BY animalTypeID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_animalType_name($animalType_id) {
    global $db;
    $query = 'SELECT * FROM animaltypes
              WHERE animalTypeID = :animalType_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':animalType_id', $animalType_id);
    $statement->execute();    
    $animalType = $statement->fetch();
    $statement->closeCursor();    
    $animalType_name = $animalType['animalTypeName'];
    return $animalType_name;
}

function add_animalType($name) {
    global $db;
    $query = 'INSERT INTO animaltypes
                (animalTypeName)
              VALUES
                (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_animalType($animalType_id) {
    global $db;
    $query = 'DELETE FROM animaltypes
              WHERE animalTypeID = :animalType_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':animalType_id', $animalType_id);
    $statement->execute();
    $statement->closeCursor();
}

?>