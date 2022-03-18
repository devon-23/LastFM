<?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        $tracks = $lastfm->getRecentTracks('devonbarks');
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Devon Barclay | Home Page</title>
    </head>
    <body style="background-color: #f8e3d8">
        <h1>Devon's LastFM!</h1>
        <div class="container space-around">
            <div><a href="/recent.php">Recently Played</a></div>
            <div><a href="/collage.php">Top Albums</a></div>
            <div><a href="/topTracks.php">Top Songs</a></div>
            <div><a href="/friends.php">Friends</a></div>
        </div>
        <h5>Now playing:</h5>
        <?php $i = 0;
        foreach($tracks->track as $k=>$v): ?>
                <?php if (empty($v->date)) { ?>
                    <img src="<?= $v->image[2]; ?>">
                    <p><?= $v->name; ?><p>
                    <span>by</span>
                    <span class="artist"><?= $v->artist; ?></span>
                <?php } else { echo "Devon is not listening to anything right now"; }  ?>
            <?php $i++;
                if($i == 1) break;
            endforeach; 
        ?>
    </body>
</html>