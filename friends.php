<?php 
    include_once('head.php');
    $user = $_GET["user"];
    if ($_GET["user"] == NULL) {
        $user = 'devonbarks';
    }
    $topFriends = $lastfm->getFriends($user);
?>

<!-- Makes a list of friends -->
<h2><a href="index.php?user=<?=$user?>">back</a></h2>
<h1><?= $user ?>s friends:</h1>
    <ol class="friends">
        <?php foreach($topFriends->user as $k=>$v): ?>
            <span class="name"><?php echo $v->name; ?></span>
        <?php endforeach; ?>
    </ol>

<include src="/footer.html"></include>