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
    '#^edit_product?#' => [
        'controller' => 'editProduct',
        'model' => 'editProduct',
        'view' => '',
    ],
    '#^product/edit_product?#' => [
        'controller' => 'editProduct',
        'model' => 'editProduct',
        'view' => 'product/edit_product',
    ],
    '#^#' => [
        'controller' => 'index',
        'model' => 'index',
        'view' => '/index',
    ],
];
