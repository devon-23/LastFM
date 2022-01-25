<?php include_once('head.php'); ?>

<!-- Makes a collage of the most played albums -->

<h1>Top Albums:</h1>
        <ol class="top_albums">
            <?php foreach($topAlbums->album as $k=>$v): ?>
                    <span class="artist"><?php echo $v->artist; ?></span>
                <img src="<?php echo $v->image[2]; ?>" alt="">
            <?php endforeach; ?>
        </ol>