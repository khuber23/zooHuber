        <nav>
            <ul>
                <!-- display links for all animalTypes -->
                <?php foreach($animalTypes as $animalType) : ?>
                <li>
                    <a href="?animalType_id=<?php 
                              echo $animalType['animalTypeID']; ?>">
                        <?php echo $animalType['animalTypeName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
