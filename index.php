<?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        $tracks = $lastfm->getRecentTracks('devonbarks');
        $weeklyAlbums = $lastfm->getWeeklyAlbums();
        $weeklyArtists = $lastfm->getWeeklyArtists();
        $weeklyTracks = $lastfm->getWeeklyTracks();
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
        <h1 style="padding-top: 0%;">Devons LastFM!</h1>
        <nav class="Navigation">
            <div class="container space-around">
                <div><a href="recent.php">Recently Played</a></div>
                <div><a href="collage.php">Top Albums</a></div>
                <div><a href="topTracks.php">Top Songs</a></div>
                <div><a href="friends.php">Friends</a></div>
            </div>
        </nav>
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
                        <br> 
                        <a href="songPage.php?track=<?= $v->name; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                            <?= $v->name; ?> 
                            <?php endforeach; ?>
                        </a>
                        <br>
                        <a href="artistPage.php?artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                            by <?= $v->artist; ?>
                            <?php endforeach; ?>
                        </a>
                    </p>
                <?php endforeach; ?>
            <?php  } else { ?> 
                    <center>Devon is not listening to anything right now</center>
                <?php }  ?>
        <?php $i++;
            if($i == 1) break;
        endforeach; 
        ?>
        <center>
            <h3><br><br>Weekly Charts</h3>
        </center>
        <nav class="Weekly Charts" style="padding-bottom: 20px;">
            <div class="container space-around">
                <div>
                    <h3>Top Albums</h3>
                    <?php foreach($weeklyAlbums->weeklyalbumchart as $k=>$v): 
                            foreach($v->album as $q=>$w): ?>
                        <br> <a href="albumPage.php?album=<?= $w->name; ?>&artist=<?= $w->artist?>">
                                <?= $w->name ?>
                            </a>
                    <?php endforeach;
                        endforeach;
                    ?>
                </div>
                <div>
                    <h3>Top Songs</h3>
                    <?php foreach($weeklyTracks->weeklytrackchart as $k=>$v): 
                            foreach($v->track as $q=>$w): ?>
                        <br><a href="songPage.php?track=<?= $w->name; ?>&artist=<?= $w->artist; ?>">
                                <?= $w->name ?>
                            </a>
                    <?php endforeach;
                        endforeach;
                    ?>
                </div>
                <div>
                    <h3>Top Artists</h3>
                    <?php foreach($weeklyArtists->weeklyartistchart as $k=>$v): 
                            foreach($v->artist as $q=>$w): ?>
                        <br> <a href="artistPage.php?artist=<?= $w->name; ?>"> 
                                <?= $w->name ?> 
                            </a>
                    <?php endforeach;
                        endforeach;
                    ?>
                </div>
            </div>
        </nav>
    </body>
</html>