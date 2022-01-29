<?php include_once('head.php'); ?>

<!-- Displays the artist in my library with least amount of listeners -->

<h1>Most unique artists</h1>
    <ol class="uniartists">
        <?php foreach($allArtists->artist as $k=>$v):
            $v->name = str_replace(' ', '+', $v->name);
            $artist="$v->name";
            $mostUnique = $lastfm->getUnique($artist);
            foreach($mostUnique->artist as $e=>$w): ?>
            <li>
                <span class="name"><?php echo $w->name; ?></span>
                <span>   ---    </span>
                <?php foreach($w->stats as $f=>$y): ?>
                    <span class="artist"><?php echo $y->listeners; ?></span>
                <?php endforeach; ?>
            </li>
        <?php endforeach; 
            endforeach; ?>
    </ol>
        