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
    $animalType_name = get_animalType_name($animalType_id);
    $animalTypes = get_animalTypes();
    $animals = get_animals_by_animalType($animalType_id);
    include('animal_list.php');

} else if ($action == 'delete_animal') {
    $animal_id = filter_input(INPUT_POST, 'animal_id', 
            FILTER_VALIDATE_INT);
    $animalType_id = filter_input(INPUT_POST, 'animalType_id', 
            FILTER_VALIDATE_INT);
    if ($animalType_id == NULL || $animalType_id == FALSE ||
            $animal_id == NULL || $animal_id == FALSE) {
        $error = "Missing or incorrect animal id or animalType id.";
        include('errors/error.php');
    } else { 
        delete_animal($animal_id);
        header("Location: .?animalType_id=$animalType_id");
    }

} else if ($action == 'show_add_form') {
    $animalTypes = get_animalTypes();
    include('animal_add.php'); 

} else if ($action == 'add_animal') {
    $animalType_id = filter_input(INPUT_POST, 'animalType_id');
    $name = filter_input(INPUT_POST, 'name');
    $age = filter_input(INPUT_POST, 'age');
    $gender = filter_input(INPUT_POST, 'gender');
    $weight = filter_input(INPUT_POST, 'weight');
    $IsPregnant = filter_input(INPUT_POST, 'IsPregnant');
    if ($animalType_id == NULL || $animalType_id == FALSE || 
            $name == NULL || $age == NULL || $gender == NULL ||
            $weight == NULL || $IsPregnant == NULL) {
        $error = "Invalid animal data. Check all fields and try again.";
        include('errors/error.php');
    } else { 
        add_animal($animalType_id, $animal_id, $name, $age, $gender, $weight, $IsPregnant);
        header("Location: .?animalType_id=$animalType_id");
    }

}
else if ($action == 'list_animalTypes') {
    $animalTypes = get_animalTypes();
    include('animalType_list.php');
} else if ($action == 'add_animalType') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid animalType name. Check name and try again.";
        include('view/error.php');
    } else {
        add_animalType($name);
        header('Location: .?action=list_animalTypes');  // Displays the animalType List page
    }
} else if ($action == 'delete_animalType') {
    $animalType_id = filter_input(INPUT_POST, 'animalType_id', 
            FILTER_VALIDATE_INT);
    delete_animalType($animalType_id);
    header('Location: .?action=list_animalTypes');      // Displays the animalType List page
}    
?>