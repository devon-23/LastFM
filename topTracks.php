<?php include_once('head.php'); ?>

<!-- Prints the tracks with the highest stream count -->

<h1>Top Tracks:</h1>
    <ol class="top_tracks">
        <?php foreach($topTracks->track as $k=>$v): ?>
            <li>
                <span class="name"><?php echo $v->name; ?></span>
                <span>   by   </span>

                <?php foreach($v->artist as $q=>$w): ?>
                    <span class="artist"><?php echo $w->name; ?></span>
                <?php endforeach; ?>

                <span>   ---    </span>
                <span class="playcount"><?php echo $v->playcount, ' plays'; ?></span>
            </li>
        <?php endforeach; ?>
    </ol>