<?php include_once('head.php'); ?>

<!-- Prints the tracks that are the most recent played -->

<h1>Recently played songs</h1>
    <ol class="playlist">
        <?php foreach($tracks->track as $k=>$v): ?>
            <li>
                <span class="name"><?= $v->name; ?></span>
                <span>   ---    </span>
                <span class="artist"><?= $v->artist; ?></span>
            </li>
        <?php endforeach; ?>
    </ol>
        