<!DOCTYPE html>
<html>
    <head>
        <title>Razgover - 404</title>
    </head>
    <body id="ePHP">
        <fieldset>
        <legend><h1>Whoops!</h1></legend>
            <h3>
            <?php
            $msgs = array("I think the internet exploded.","Surfing the web with water isn't a good idea. It'll fry the electronics.","Your shirt should be made of spider silk. Maybe that'll attract the web.","Have you been surfing the wifi lately?","You should become a ship captain because of your surfing skills.");
            echo $msgs[array_rand($msgs)];
            ?>
            </h3>
        </fieldset>
        <h3>The page you were looking for wasn't found.</h3>
        Go back <a href="index.php">here</a>
    </body>
</html>