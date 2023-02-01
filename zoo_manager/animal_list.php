<?php include 'view/header.php'; ?>
<main>
    <h1>Animal List</h1>

    <aside>
        <!-- display a list of animalTypes -->
        <h2>Animal Types</h2>
        <?php include 'view/animalTypes_nav.php'; ?>
    </aside>

    <section>
        <!-- display a table of animals -->
        <h2><?php echo $animalType_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Weight</th>
                <th class="right">IsPregnant</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($animals as $animal) : ?>
            <tr>
                <td><?php echo $animal['animalName']; ?></td>
                <td><?php echo $animal['animalAge']; ?></td>
                <td><?php echo $animal['animalGender']; ?></td>
                <td><?php echo $animal['animalWeight']; ?></td>
                <td class="right"><?php echo $animal['IsPregnant']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_animal">
                    <input type="hidden" name="animal_id"
                           value="<?php echo $animal['animalID']; ?>">
                    <input type="hidden" name="animalType_id"
                           value="<?php echo $animal['animalTypeID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add animal</a></p>
        <p class="last_paragraph"><a href="?action=list_animalTypes">List animalTypes</a></p>        
    </section>
</main>
<?php include 'view/footer.php'; ?>