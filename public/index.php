<?php

require(__DIR__ . '/../vendor/autoload.php');

/**
 * Instantiate app
 */
$config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$app = new \Slim\App($config);

/**
 * Pluck container
 */
$container = $app->getContainer();

/**
 * Bridges & adapters
 */
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../views', [
        'cache' => __DIR__ . '/../cache',
        'auto_reload' => true,
        'debug' => true
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};

/**
 * Routes
 */
$app->get('/', App\Controllers\HomeController::class)->setName('home');

/**
 * Run application
 */
$app->run();
