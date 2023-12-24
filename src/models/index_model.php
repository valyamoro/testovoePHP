<?php

function getAll(): array
{
    $query = 'SELECT * FROM products';

    $sth = connectionDB()->prepare($query);
    $sth->execute();

    return $sth->fetchAll();
}
