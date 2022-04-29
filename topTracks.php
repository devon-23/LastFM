<?php 
    include_once('head.php'); 
    $topTracks = $lastfm->getTopTracks('devonbarks');
?>

<!-- Prints the tracks with the highest stream count -->

<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='stylesheets/artist.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recently Played</title>
</head>
<h1>Top Tracks:</h1>
<ol class="top_tracks">
    <?php foreach($topTracks->track as $k=>$v): ?>
        <o>
            <li>
                <a href="albumPage.php?album=<?= $v->album; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $t->name; ?>">
                    <img src="<?= $v->image[2]; ?>" alt="<?= $t->image[2]; ?>">
                    <?php endforeach; ?>
                </a>
                <br><br>
                <a href="songPage.php?track=<?= $v->name; ?>&artist=<?php foreach($v->artist as $q=>$t):echo $t->name; ?>">
                    <?= $v->name; ?> 
                    <?php endforeach; ?>
                </a>
                <br><br>
                <a href="artistPage.php?artist=<?php foreach($v->artist as $q=>$t):echo $t->name; ?>">
                    by <?= $t->name; ?>
                    <?php endforeach; ?>
                </a>
                <br><br><br><br>
                <a>
                    <?= $v->playcount; ?> plays
                </a>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </li>
        </o>
    <?php endforeach; ?>
</ol>