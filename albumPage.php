<?php 
    include_once('head.php');
    error_reporting(E_ALL ^ E_WARNING);
    $albumName = $_GET['id'];
    $artist = $_GET['artist'];
    if ($albumName != null && $artist != null):
        $albumInfo = $lastfm->getInfo(str_replace(' ','+', $artist), str_replace(' ', '+', $albumName));
    endif;
?>

<!-- Loads a different Album based on what was clicked from the collage page -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='style.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $albumName ?> | <?= $artist ?></title>
    </head>
    <body>
        
        <?php if ($artist === null || $albumName === null): ?>
                <h3>album not found.</h3>
        <?php else: ?>
            <h3><?= $artist ?><?php foreach($albumInfo->album as $k=>$v): ?></h3>
                <img src="<?php echo $v->image[4]; ?>" alt="unable to load" style="right:50px; bottom:720px; border: 5px solid #000; float:right;">
                        <?php endforeach; ?></h3>
            <h1><?= $albumName ?></h1>
        <?php endif; ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <hr width="2.5px" size="300", color="black">
        <hr style="border-top: 1px solid black">

        <?php foreach($albumInfo->album as $k=>$v):
            foreach($v->wiki as $f=>$g): ?>
                    <p><?= $g->summary; ?></p>
        <?php endforeach;
            endforeach; ?>
    </body>
</html>