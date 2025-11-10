<?php
$name = "Jude";
$time = date("H");

if ($time < 12) {
    $greeting = "Good morning!";
} elseif ($time < 18) {
    $greeting = "Good afternoon!";
} else {
    $greeting = "Good evening!";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hello Page</title>
    </head>

    <body>
        <h1>Welcome to the <i>hello page</i> </h1>

        <h1><?= $greeting ?> <?=$name?>!</h1>
        <p>The current time is <?= date("H:i:s") ?>.</p>

    </body>

    <footer>

    </footer>
</html>