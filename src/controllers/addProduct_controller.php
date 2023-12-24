<?php

$metaTitle = 'Добавить продукт';

$product = $_POST;
$productImage = $_FILES['image'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg[] = validateProduct($product);
    $msg[] = validateImage($productImage);

    if (!\is_null($msg[0]) && !\is_null($msg[1])) {
        $_SESSION['msg'] = $msg;
    } else {
        $filePath = uploadImage($productImage);
        $product['image_path'] = $filePath;
        $now = \date('Y-m-d H:i:s');
        $product['now'] = $now;
        addProduct($product);
    }
}

$content = render($currentAction['view']);


