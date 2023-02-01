<?php
require('model/database.php');
require('model/animal_db.php');
require('model/animalType_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_animals';
    }
}  

if ($action == 'list_animals') {
    $animalType_id = filter_input(INPUT_GET, 'animalType_id', 
            FILTER_VALIDATE_INT);
    if ($animalType_id == NULL || $animalType_id == FALSE) {
        $animalType_id = 1;
    }
    $animalTypes = get_animalTypes();
    $animalType_name = get_animalType_name($animalType_id);
    $animals = get_animals_by_animalType($animalType_id);
    include('animal_list.php');
} else if ($action == 'view_animal') {
    $animal_id = filter_input(INPUT_GET, 'animal_id', 
            FILTER_VALIDATE_INT);   
    if ($animal_id == NULL || $animal_id == FALSE) {
        $error = 'Missing or incorrect animal id.';
        include('errors/error.php');
    } else {
        $animalTypes = get_animalTypes();
        $animal = get_animal($animal_id);

        // Get animal data
        $name = $animal['animalName'];
        $age = $animal['animalAge'];
        $gender = $animal['animalGender'];
        $weight = $animal['animalWeight'];
        $IsPregnant = $animal['IsPregnant'];


        // Get image URL and alternate text
        // $image_filename = '../images/' . $code . '.png';
        // $image_alt = 'Image: ' . $code . '.png';

        include('animal_view.php');
    }
}
?>