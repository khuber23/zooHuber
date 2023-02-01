<?php include 'view/header.php'; ?>
<main>
    <aside>
        <h1>Animal Types</h1>
        <?php include 'view/animalTypes_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $name; ?></h1>
        <div id="left_column">
            <!-- <p>
                <img src="<?php echo $image_filename; ?>"
                    alt="<?php echo $image_alt; ?>" />
            </p> -->
        </div>

        <div id="right_column">
            <p><b>Name:</b> <?php echo $name; ?></p>
            <p><b>Age:</b> <?php echo $age; ?></p>
            <p><b>Gender:</b> <?php echo $gender; ?></p>
            <p><b>Weight:</b> <?php echo $weight; ?></p>
            <p><b>IsPregnant:</b> <?php echo $IsPregnant; ?></p>

        </div>
    </section>
</main>
<?php include 'view/footer.php'; ?>