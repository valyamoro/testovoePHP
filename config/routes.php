<?php

return [
    '#^add_product?#' => [
        'controller' => 'addProduct',
        'model' => 'addProduct',
        'view' => '',
    ],
    '#^product/add_product?#' => [
        'controller' => 'addProduct',
        'model' => 'addProduct',
        'view' => 'product/add_product',
    ],
    '#^#' => [
        'controller' => 'index',
        'model' => 'index',
        'view' => '/index',
    ],
];
