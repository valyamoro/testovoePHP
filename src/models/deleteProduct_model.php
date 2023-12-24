<?php

function deleteProduct(int $id): void
{
    $query = 'DELETE FROM products WHERE id=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$id]);
}

function getImageById($id): bool|array
{
    $query = 'SELECT image_path FROM products WHERE id=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$id]);

    return $sth->fetch();
}
