<?php require __DIR__ . '/../vendor/autoload.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pokédex</title>
    </head>

    <body>
    <h2>Pokédex - Pokemon encyclopedia</h2>
    <?php
        $identifier = isset($_GET['identifier']) ? strip_tags($_GET['identifier']) : null;
        $offset = 0;

        if (isset($_GET['next'])) {
            $offset = (int) $_GET['next'];
            $identifier = null;
        } else if (isset($_GET['previous'])) {
            $offset = (int) $_GET['previous'];
            $identifier = null;
        }

        $client = new Pokedex\Client;
        $pokemon = new Pokedex\Pokemon($client);
        $json = $pokemon->get($identifier, $offset);

        if (isset($json['code'])) {
            require __DIR__ . '/../templates/error.php';
        } else if ($offset || empty($identifier)) {
            require __DIR__ . '/../templates/list.php';
        } else {
            require __DIR__ . '/../templates/single.php';
        }
    ?>
    </body>
</html>