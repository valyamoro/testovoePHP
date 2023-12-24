<?php

$metaTitle = 'Изменить продукт';

$id = (int)$_GET['id'];
$product = $_POST;
$productImage = $_FILES['image'];
print_r($productImage);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg[] = validateProduct($product);
    $msg[] = validateImage($productImage);

    if (!\is_null($msg[0]) && !\is_null($msg[1])) {
        $_SESSION['msg'] = $msg;
    } else {
        $oldImagePath = getImageById($id)['image_path'];
        $isDeletedImage = \unlink(__DIR__ . '\..\\' . $oldImagePath);

        if ($isDeletedImage) {
            $product['image_path'] = uploadImage($productImage);
            $now = \date('Y-m-d H:i:s');
            $product['now'] = $now;
            editProduct($product, $id);
        } else {
            $_SESSION['error'] = 'Картинка не удалилась' . "\n";
        }
    }
}

$content = render($currentAction['view']);
