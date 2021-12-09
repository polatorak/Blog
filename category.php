<?php
    include("verbinden.php");
    include("header.php");

    if(!empty($_GET["id"]))
    {
        $kat_id = $_GET["id"];
    }
?>


<main>
    <?php
        if(!isset($kat_id))
        {
            // nicht definiert
            echo("Kategorie nicht gefunden.");
        }
        else
        {
            $anfrage = "SELECT * FROM kategorien WHERE id=" . $kat_id;
            $result = $verbindung->query($anfrage);

            // haben wir diese Kategorie?
            if($result->num_rows == 0)
            {
                echo("Kategorie nicht gefunden.");
            }
            else
            {
                
                ?>

                <h1>Willkommen in Kategorie <?= $result->fetch_assoc()["name"]; ?></h1>

                Posts:
                <ul>
                    <?php

                        $anfrage = "SELECT * FROM posts WHERE kategorie=" . $kat_id;
                        $result = $verbindung->query($anfrage);

                        while($row = $result->fetch_assoc())
                        {
                            ?>
                            <li><a href="post.php?id=<?= $row["id"] ?>"><?= $row["titel"] ?></a></li>
                            <?php
                        }
                    ?>
                </ul>

                <?php
            }
        }
        ?>
</main>




<?php
    include("sidebar.php");

    include("footer.php");
    include("close.php");
?>