<?php include 'view/header.php'; ?>
<main>

    <h1>Animal Type List</h1>
    <table>
        <tr>
            <th>Type</th>
            <th>&nbsp;</th>
        </tr>        
        <!-- add animalType rows here -->
        <?php foreach ($animalTypes as $animalType) : ?>
        <tr>
            <td><?php echo $animalType['animalTypeName']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_animalType" />
                    <input type="hidden" name="animalType_id"
                           value="<?php echo $animalType['animalTypeID']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Animal Type</h2>
    <!-- add code for form here -->
      <form id="add_animalType_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_animalType" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
      </form>
      
    <p><a href="index.php?action=list_animals">List Animals</a></p>

</main>
<?php include 'view/footer.php'; ?>