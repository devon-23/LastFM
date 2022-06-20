<?php 
    include_once('head.php');
    $user = $_GET["user"];
    if ($_GET["user"] == NULL) {
        $user = 'devonbarks';
    }
    $topFriends = $lastfm->getFriends($user);
?>

<!-- Makes a list of friends -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <h2><a href="index.php?user=<?=$user?>">back</a></h2>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='style.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $track ?> | <?= $artist ?></title>
    </head>

    <body>
        <h1><?= $user ?>s friends:</h1>
        <ol class="friends"> 
            <?php foreach($topFriends->user as $k=>$v): ?>
                <a href="index.php?user=<?=$v->name;?>"><p style="font-size: 15px;"><span class="name"><?= $v->name; ?></span></p></a>
            <?php endforeach; ?>
        </ol>
    </body>
</html>