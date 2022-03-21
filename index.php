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
        <title>Devon Barclay | LastFM</title>
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
            <?php if (empty($v->date)) {
                $artist="$v->artist";
                $album="$v->name";
                $albumInfo = $lastfm->getInfo(str_replace(' ','+', $artist), str_replace(' ', '+', $album));
                foreach($albumInfo->album as $q=>$w):?>
                    <p>
                        <a href="albumPage.php?album=<?= $v->album; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                            <img src="<?= $v->image[2]; ?>" alt="<?= $t->image[2]; ?>">
                            <?php endforeach; ?>
                        </a>
                        <br> <?= $v->name; ?>
                        <br>by <?= $v->artist; ?>
                    </p>
                <?php endforeach; ?>
            <?php  } else { ?> 
                    <p style="margin-left: 30%;">Devon is not listening to anything right now</p>
                    <?php }  ?>
        <?php $i++;
            if($i == 1) break;
        endforeach; 
        ?>
    </body>
</html>