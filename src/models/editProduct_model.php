<?php

function validateProduct(array $data): ?string
{
    $msg = null;

    if (empty($data['name'])) {
        $msg = 'Заполните имя продукта' . "\n";
    } elseif (\mb_strlen($data['name']) > 255) {
        $msg .= 'Слишком длинное имя продукта' . "\n";
    } elseif (\mb_strlen($data['name']) < 3) {
        $msg .= 'Слищком короткое имя продукта' . "\n";
    } elseif (\preg_match('/^[0-9]+$/', $data['name'])) {
        $msg .= 'Имя продукта содержит только цифры' . "\n";
    }

    if (empty($data['description'])) {
        $msg = 'Заполните описание продукта' . "\n";
    } elseif (\mb_strlen($data['description']) > 255) {
        $msg .= 'Слишком длинное описание продукта' . "\n";
    } elseif (\mb_strlen($data['description']) < 3) {
        $msg .= 'Слищком короткое описание продукта' . "\n";
    } elseif (\preg_match('/^[0-9]+$/', $data['description'])) {
        $msg .= 'Описание продукта содержит только цифры' . "\n";
    }

    if (empty($data['price'])) {
        $msg = 'Заполните поле цены' . "\n";
    } elseif ($data['price'] > 99999999) {
        $msg .= 'Слишком большая цена' . "\n";
    } elseif ($data['price'] <= 0) {
        $msg .= 'Слишком низкая цена' . "\n";
    } elseif(!\preg_match('/^[^a-zA-Z]+$/', $data['price'])) {
        $msg .= 'Поле цены не должно содержать буквы' . "\n";
    }

    return $msg;
}

function validateImage(array $data): ?string
{
    $msg = null;

    $allowedExtensions = ['jpeg', 'png', 'gif', 'webp', 'jpg'];

    $extension = \pathinfo($data['name'], \PATHINFO_EXTENSION);

    if (empty($data['name'])) {
        $msg = 'Аватар обязателен.' . "\n";
    } elseif (!\in_array($extension, $allowedExtensions)) {
        $msg .= 'Недопустимый тип файла.' . "\n";
    } elseif ($data['size'] > 1048576) {
        $msg .= 'Размер файла превышает допустимый.' . "\n";
    }

    return $msg;
}

function editProduct(array $data, int $id): bool
{
    $query =
        'UPDATE products 
    SET name = :name, 
        description = :description, 
        price = :price, 
        image_path = :image_path, 
        updated_at = :updated_at
    WHERE id = :id LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([
        ':name' => $data['name'],
        ':description' => $data['description'],
        ':price' => $data['price'],
        ':image_path' => $data['image_path'],
        ':updated_at' => $data['now'],
        ':id' => $id,
    ]);

    return (bool)$sth->rowCount();
}

function getImageById($id): bool|array
{
    $query = 'SELECT image_path FROM products WHERE id=? LIMIT 1';

    $sth = connectionDB()->prepare($query);

    $sth->execute([$id]);

    return $sth->fetch();
}
