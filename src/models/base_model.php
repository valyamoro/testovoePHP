<?php

function dump(mixed $data): void
{
    echo '<pre>';
    \print_r($data);
    echo '</pre>';
}

function render(string $view, array $data = []): string
{
    \extract($data);

    $viewPath = __DIR__ . "/../../view/{$view}.php";
    if (!\file_exists($viewPath)) {
        $code = 404;
        \http_response_code($code);
        require __DIR__ . "/../../view/errors/{$code}.php";
        die;
    }

    \ob_start();
    include $viewPath;

    return \ob_get_clean();
}

function redirect(string $http = ''): never
{
    $redirect = $http ?? $_SERVER['HTTP_REFERER'] ?? '/';

    \header("Location: {$redirect}");
    die;
}

function connectionDB(): ?\PDO
{
    $data = include __DIR__ . '/../../config/db.php';
    static $dbh = null;

    if (!\is_null($dbh)) {
        return $dbh;
    }

    $dbh = new \PDO(
        "{$data['port']}:host={$data['host']};dbname={$data['dbname']};charset={$data['charset']}",
        $data['username'],
        $data['password'],
        $data['options'],
    );

    return $dbh;
}
