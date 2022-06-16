<?php 
    include_once('head.php');
    $user = $_GET["user"];
    if ($_GET["user"] == NULL) {
        $user = 'devonbarks';
    }
    $topTracks = $lastfm->getTopTracks($user);
?>

<!-- Prints the tracks with the highest stream count -->

<head>
    <h2><a href="index.php?user=<?=$user?>">back</a></h2>
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
                    <?php
                            $albumInfo = $lastfm->getInfo(str_replace(' ','+', $t->name), str_replace(' ', '+', $v->album));
                        foreach($albumInfo->album as $s=>$d): ?>
                            <img src="<?php echo $d->image[4]; ?>" alt="unable to load">
                            <?php endforeach; ?>
                    
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