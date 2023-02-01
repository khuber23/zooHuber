<?php include 'view/header.php'; ?>
<main>
    <aside>
        <h1>Animal Types</h1>
        <?php include 'view/animalTypes_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $animalType_name; ?></h1>
        <ul class="nav">
            <!-- display links for animals in selected animalType -->
            <?php foreach ($animals as $animal) : ?>
            <li>
                <a href="?action=view_animal&amp;animal_id=<?php 
                          echo $animal['animalID']; ?>">
                    <?php echo $animal['animalName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include 'view/footer.php'; ?>