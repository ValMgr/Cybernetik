<?php

    $getArticles = "SELECT * FROM `articles` ORDER BY `NumArticle` DESC";
    $query = $dbPdo->query($getArticles);
    $Articles = $query->fetchAll();

    //print_r($Articles);

?>


<div class="wrapper">

                <?php include 'NAVBAR.php' ?>

                <div class="HexagonGroupAdmin">
                    <div id="hexagonProject1"></div>
                    <div id="hexagonProject1-1"></div>
                    <h2 id="hexagonProject1-title">Administrator Area</h2>
                </div>

                <a id="AdminbtnCreate" href="AddArticle.php">New Brief</a>

                <h3 class="listadmin">List of Articles & News</h3>

                <div id="AdminList">

                <?php

                    $img = count($Articles);

                    foreach ($Articles as $key => $rows) {
                        
                    ?>

                    <div id="AdminActu">
                        <img src="Files/Article/picture/<?php echo($rows['imagename']) ?>">
                        <h3><?php echo $rows[2];?></h3>
                        <p><?php echo $rows[3];?></p>
                        <p class="ActuDate"><i class="far fa-clock"></i> <?php echo $rows[1];?></p><br>
                    </div>
                    <div id="Controles">
                        <a class="AdminbtnModif" href="EditNewArticleExemple.php">Edit</a>
                        <a class="AdminbtnSupp" onclick="return confirm('Are you sure you want to delete this item ?'); getElementById('Delete').submit();" href="Files/Article/Article_Delete.php?ArtID=<?php echo $rows[0]; ?>">Delete</a>
                    </div>


                <?php
                    $img--;
                } ?>

                </div>

        </div>