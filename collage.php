<?php include_once('head.php'); ?>

<!-- Makes a collage of the most played albums -->

<h1>Top Albums:</h1>
<form action="collage.php" method="get">
    how many would you like to see? (limit 50) <input type="number" name="name">
    <input type="submit">
</form>

<center>
    <ol class="top_albums">
        <?php error_reporting(E_ALL ^ E_WARNING);
        $i = 0;
        if ($_GET["name"] > 1) {
            foreach($topAlbums->album as $k=>$v): ?>
                <a href="albumPage.php?id=<?= $v->name; ?>">
                    <img src="<?php echo $v->image[2]; ?>" alt="">
                </a>
                <?php $i++;
                if($i == $_GET["name"]) break;
            endforeach;
        } ?>
    </ol>
</center>