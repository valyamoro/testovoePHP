<?php

$id = (int)$_GET['id'];

$product = getImageById($id);
$isDeletedImage = unlink(__DIR__ . '\..\\' . $product['image_path']);

if ($isDeletedImage) {
    deleteProduct($id);
} else {
    $_SESSION['error'] = 'Картинка не удалилась' . "\n";
    redirect();
}
