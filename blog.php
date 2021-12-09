<?php
    include("verbinden.php");
    include("header.php");
?>


<main>
    <h1>Willkommen in Blog</h1>

    Kategorien:
    <ul>
        <?php
            $anfrage = "SELECT * FROM kategorien";
            $result = $verbindung->query($anfrage);

            while($row = $result->fetch_assoc())
            {
                ?>
                <li><a href="category.php?id=<?= $row["id"] ?>"><?= $row["name"] ?></a></li>
                <?php
            }
        ?>
    </ul>
</main>


<?php

    include("sidebar.php");

    include("footer.php");

    include("close.php");

?>


