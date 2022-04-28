<?php 
    include_once('head.php');
    $tracks = $lastfm->getRecentTracks('devonbarks');
?>

<!-- Prints the tracks that are the most recent played -->
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='stylesheets/artist.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recently Played</title>
    </head>
<h1>Recently played songs</h1>
    <ol class="playlist">
        <?php foreach($tracks->track as $k=>$v): ?>
            <o>
                <li>
                <a href="albumPage.php?album=<?= $v->album; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                    <img src="<?= $v->image[2]; ?>" alt="<?= $t->image[2]; ?>">
                    <?php endforeach; ?>
                </a>
                <br><br>
                <a href="songPage.php?track=<?= $v->name; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                    <?= $v->name; ?> 
                    <?php endforeach; ?>
                </a>
                <br><br>
                <a href="artistPage.php?artist=<?php foreach($v->artist as $q=>$t):echo $v->artist; ?>">
                    by <?= $v->artist; ?>
                    <?php endforeach; ?>
                </a>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </li>
        </o>
                
        <?php endforeach; ?>
    </ol>
        