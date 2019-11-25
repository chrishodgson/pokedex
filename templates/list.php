<?php
    $helper = new Pokedex\UrlHelper();
    $results = $json['results'] ?? [];
    $next = $helper->getOffset($json['next'] ?? null);
    $previous = $helper->getOffset($json['previous'] ?? null);
?>

<h3>Pokemon Search</h3>
<form method="GET">
    <input name="identifier" value="<?= $identifier ?>" placeholder="Enter a Pokemon name" />
    <button>Search</button>
    <hr/>

    <?php if (empty($results)): ?>
        <p>No results found.</p>
    <?php else: ?>
        <p><strong>Search results:</strong></p>

        <p>
            <?php if (!is_null($previous)): ?>
                <button name="previous" value="<?= $previous ?>"><< Previous Pokemons</button>
            <?php endif; ?>

            <?php if (!is_null($next)): ?>
                <button name="next" value="<?= $next ?>">Next Pokemons >></button>
            <?php endif; ?>
        </p>

        <table>
            <?php foreach($results as $item): ?>
            <tr><td>
                <?php if(isset($item['name'])): ?>
                <a href="<?= '?identifier=' . $item['name'] ?>"><?= $item['name'] ?></a>
                <?php endif; ?>
            </td></tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</form>
