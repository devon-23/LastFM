<?php include_once('head.php'); ?>

<!-- Makes a list of friends -->

<h1>Devon's friends:</h1>
    <ol class="friends">
        <?php foreach($topFriends->user as $k=>$v): ?>
            <span class="name"><?php echo $v->name; ?></span>
        <?php endforeach; ?>
    </ol>

<include src="/footer.html"></include>