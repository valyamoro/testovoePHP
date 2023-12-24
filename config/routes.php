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
    '#^delete_product?#' => [
        'controller' => 'deleteProduct',
        'model' => 'deleteProduct',
        'view' => '',
    ],
    '#^product/delete_product?#' => [
        'controller' => 'deleteProduct',
        'model' => 'deleteProduct',
        'view' => '',
    ],
    '#^update_price?#' => [
        'controller' => 'updatePrice',
        'model' => 'updatePrice',
        'view' => '',
    ],
    '#^product/update_price?#' => [
        'controller' => 'updatePrice',
        'model' => 'updatePrice',
        'view' => '',
    ],
    '#^#' => [
        'controller' => 'index',
        'model' => 'index',
        'view' => '/index',
    ],
];
