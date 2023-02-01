<?php include '../view/header.php'; ?>
<main>
    <h1>Add Animal</h1>
    <form action="index.php" method="post" id="add_animal_form">
        <input type="hidden" name="action" value="add_animal">

        <label>Animal Type:</label>
        <select name="animalType_id">
        <?php foreach ( $animalTypes as $animalType ) : ?>
            <option value="<?php echo $animalType['animalTypeID']; ?>">
                <?php echo $animalType['animalTypeName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Age:</label>
        <input type="text" name="age" />
        <br>

        <label>Gender:</label>
        <input type="text" name="gender" />
        <br>

        <label>Weight:</label>
        <input type="text" name="weight" />
        <br>

        <label>IsPregnant:</label>
        <input type="text" name="IsPregnant" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Animal" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_animals">View Animal List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>