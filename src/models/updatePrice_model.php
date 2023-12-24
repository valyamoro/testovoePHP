<?php

function validatePrice(int $data): ?string
{
    $msg = null;

    if (empty($data)) {
        $msg = 'Заполните поле цены' . "\n";
    } elseif ($data > 99999999) {
        $msg .= 'Слишком большая цена' . "\n";
    } elseif ($data <= 0) {
        $msg .= 'Слишком низкая цена' . "\n";
    } elseif(!\preg_match('/^[^a-zA-Z]+$/', $data)) {
        $msg .= 'Поле цены не должно содержать буквы' . "\n";
    }

    return $msg;
}

function updatePrice(int $newPrice, int $id): int
{
    $query = 'UPDATE products SET price=? WHERE id=?';

    $sth = connectionDB()->prepare($query);
    $sth->execute([$newPrice, $id]);

    return (bool)$sth->rowCount();
}
