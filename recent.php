<?php include_once('head.php'); ?>
        <h1>Recently played songs</h1>
        <ol class="playlist">
            <?php foreach($tracks->track as $k=>$v): ?>
                <li>
                    <span class="name"><?php echo $v->name; ?></span>
                    <span>   ---    </span>
                    <span class="artist"><?php echo $v->artist; ?></span>
                </li>
            <?php endforeach; ?>
        </ol>
        </body>
</html>