<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPrice = $_POST['newPrice'];
    $id = $_POST['productId'];
    // проверка на корректность переданных значений.
    // нужно дать ответ пользователю, что цена успешно изменена.
    $msg = validatePrice($newPrice);

    if (!\is_null($msg)) {
        $_SESSION['error'] = $msg;
    } else {
        $_SESSION['success'] = 'Цена успешно изменена!';
        updatePrice($newPrice, $id);
        redirect('/');
    }
}
