<!DOCTYPE html>
<html lang="en">
    <!-- <title>LastFM</title> -->
    <script src='index.php'></script>
    <body style="background-color: #f8e3d8">
        <h2><a href="/index.php">back</a></h2>
        <?php
            require 'lastfm.php';
            $lastfm = new LastFM("092d316884d8385f35ad8b84f5f42ef8");
        ?>
    </body>
</html>