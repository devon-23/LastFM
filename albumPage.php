<?php 
    include_once('head.php');
    $albumName = $_GET['id'];
    $artist = $_GET['artist'];
    $albumInfo = $lastfm->getInfo(str_replace(' ','+', $artist), str_replace(' ', '+', $albumName));
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
        <h3><?= $artist ?><?php foreach($albumInfo->album as $k=>$v): ?>
            <img src="<?php echo $v->image[4]; ?>" alt="" style="right:50px; bottom:720px; border: 5px solid #000; float:right;">
                        <?php endforeach; ?></h3>
        <h1><?= $albumName ?></h1>
        
        <hr width="2.5px" size="500", color="black", style="position:absolute; left:75%; margin-left:-3px; top:0;">
        
         
    </body>
</html>