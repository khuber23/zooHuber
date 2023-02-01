<?php
function get_animals_by_animalType($animalType_id) {
    global $db;
    $query = 'SELECT * FROM animals
              WHERE animals.animalTypeID = :animalType_id
              ORDER BY animalID';
    $statement = $db->prepare($query);
    $statement->bindValue(":animalType_id", $animalType_id);
    $statement->execute();
    $animals = $statement->fetchAll();
    $statement->closeCursor();
    return $animals;
}

function get_animal($animal_id) {
    global $db;
    $query = 'SELECT * FROM animals
              WHERE animalID = :animal_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":animal_id", $animal_id);
    $statement->execute();
    $animal = $statement->fetch();
    $statement->closeCursor();
    return $animal;
}

function delete_animal($animal_id) {
    global $db;
    $query = 'DELETE FROM animals
              WHERE animalID = :animal_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':animal_id', $animal_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_animal($animalType_id, $animal_id, $name, $age, $gender, $weight, $IsPregnant) {
    global $db;
    $query = 'INSERT INTO animals
                 (animalTypeID, animalID, animalName, animalAge, animalGender, animalWeight, Ispregnant)
              VALUES
                 (:animalType_id, :animal_id, :name, :age, :gender, :weight, :IsPregnant)';
    $statement = $db->prepare($query);
    $statement->bindValue(':animalType_id', $animalType_id);
    $statement->bindValue(':animal_id', $animal_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':gender', $gender);
    $statement->bindValue(':weight', $weight);
    $statement->bindValue(':IsPregnant', $IsPregnant);
    $statement->execute();
    $statement->closeCursor();
}
?>