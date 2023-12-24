<?php

$metaTitle = 'Главная страница';

$products = getAll();

$content = render($currentAction['view'], [
    'products' => $products,
]);
