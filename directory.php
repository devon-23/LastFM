<!DOCTYPE html>
<html lang="en">
    <title>LastFM</title>
    <script src='index.php'></script>
    <body>
    <?php
        require 'lastfm.php';
        $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        $tracks = $lastfm->getRecentTracks('devonbarks');
    ?>

    <h1>Devon's LastFM Statistics!</h1>
        <ul>
            <li><a href="/recent.php">Recently Played</li>
            <li><a href="/topTracks.php">Top played Tracks</a></li>
            <li><a href="/collage.php">Top played Albums</li>
            <li><a href="/friends.php">Friends</a></li>
            <li><a href="/mostUnique.php">Unique Artists</a></li>
        </ul>
        <h3>Now playing:</h3>
        <?php $i = 0;
        foreach($tracks->track as $k=>$v): ?>
                <?php if (empty($v->date)) { ?>
                    <span class="name"><?= $v->name; ?></span>
                    <span>   by    </span>
                    <span class="artist"><?= $v->artist; ?></span>
                <?php } else { echo "Devon is not listening to anything right now"; }  ?>
        <?php 
            $i++;
            if($i == 1) break;
            endforeach; 
        ?>
    </body>
</html>