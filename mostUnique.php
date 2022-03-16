<?php 
    include_once('head.php'); 
    $allArtists = $lastfm->getArtists('devonbarks');
?>

<!-- Displays the artist in my library with least amount of listeners -->

<h1>Most unique artists</h1>
    <ol class="uniartists">
        <?php foreach($allArtists->artist as $k=>$v):
            $v->name = str_replace(' ', '+', $v->name); //replaces a space for '+' for the link
            $artist="$v->name"; //puts that into new vairable with correct spacing / no array
            $mostUnique = $lastfm->getUnique($artist); //does new function with the artist being put into the link
            foreach($mostUnique->artist as $e=>$w): ?>
                    <?php foreach($w->stats as $f=>$y): if ($y->listeners < 5000 && $y->listeners > 3) { ?>
                        <li>
                            <span class="name"><?php echo $w->name; ?></span>
                            <span>   ---    </span>
                            <span class="artist"><?php echo $y->listeners; ?> listeners</span>
                        </li>
                    <?php } endforeach; ?>
            <?php  endforeach; 
        endforeach; ?>
    </ol>
