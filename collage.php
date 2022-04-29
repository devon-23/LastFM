<?php 
    include_once('head.php'); 
    $topAlbums = $lastfm->getTopAlbums('devonbarks');
?>

<!-- Makes a collage of the most played albums -->

<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href='stylesheets/artist.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Albums</title>
</head>
<h1>Top Albums:</h1>
<form action="collage.php" method="get" style="font-size: 20px; margin-left: 4%;">
    how many would you like to see? (limit 50) <input type="number" name="name">
    <input type="submit">
</form>

<center>
    <ol class="top_albums">
        <?php error_reporting(E_ALL ^ E_WARNING);
        $i = 0;
        if ($_GET["name"] > 1) {
            foreach($topAlbums->album as $k=>$v): ?>
                <a href="albumPage.php?album=<?= $v->name; ?>&artist=<?php foreach($v->artist as $q=>$w):echo $w->name; endforeach; ?>"> 
                    <img src="<?php echo $v->image[2]; ?>" alt="" style="margin-left: 3%;">
                </a>
                <?php $i++;
                if($i == $_GET["name"]) break;
            endforeach;
        } ?>
    </ol>
</center>