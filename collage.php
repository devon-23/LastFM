<?php include_once('head.php'); ?>

<!-- Makes a collage of the most played albums -->

<h1>Top Albums:</h1>
        <ol class="top_tracks">
            
            <?php foreach($topAlbums->topalbum as $k=>$v): ?>
                <li>
                    <?php foreach ($k->artist as $q=>$w): ?>
                        <span class="name"><?php echo $w->name; ?></span>
                    <?php endforeach; ?>
                    
                    <span class="name"><?php echo $v->name[0]; ?></span>
                    <span>   ---    </span>
                    <span class="artist"><?php echo $v->artist[0]; ?></span>
                    <span class="playcount"><?php echo $v->playcount; ?></span>
                </li>
            <?php endforeach; ?>
        </ol>