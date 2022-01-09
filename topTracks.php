<?php include_once('head.php'); ?>
<h1>Top Tracks:</h1>
        <ol class="top tracks">
            <?php foreach($topTracks->track as $k=>$v): ?>
                <li>
                    <span class="name"><?php echo $v->name; ?></span>
                    <span>   ---    </span>
                    <span class="date"><?php echo $v->artist; ?></span>
                </li>
            <?php endforeach; ?>
        </ol>