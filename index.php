<?php

use dofus\controllers\RssController;
use dofus\controllers\UsersController;
use dofus\controllers\GiftsController;
use dofus\controllers\ServersController;
use dofus\controllers\AlertsController;
use dofus\DatabaseFactory;
use dofus\models\Accounts;
use dofus\models\AccountsInformations;
use dofus\utils\Picker;

// Importation de l'autoloader
require 'vendor/autoload.php';

session_start();

// Definition de la timezone
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, "fr_FR");

// Variables globales
define('DS', DIRECTORY_SEPARATOR);
define('SRC', __DIR__ . DS . 'src');
define('ASSETS', __DIR__ . DS . 'assets');

// Configuration de la connexion a la base de donnees
DatabaseFactory::setConfig();
DatabaseFactory::makeConnection();

// Initialisation de Slim
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true // Affichage des erreurs
    ]
]);

$container = $app->getContainer();

$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('File not found.');
    };
};

$app->post('/{cmntt:[a-zA-Z]+}/register', UsersController::class . ':register');
$app->get('/crypto.png', UsersController::class . ':captcha');
$app->get('/registration_come_from.{cmntt:[a-zA-Z]+}', UsersController::class . ':registrationComeFrom');
$app->get('/rss/rss.game.{cmntt:[a-zA-Z]+}.xml', RssController::class . ':rss');
$app->get('/game_actions.l.{cmntt:[a-zA-Z]+}', GiftsController::class . ':gifts');
$app->get('/serverstatus.{cmntt:[a-zA-Z]+}.xml', ServersController::class . ':serverStatus');
$app->get('/alert.{cmntt:[a-zA-Z]+}.xml', AlertsController::class . ':alerts');

$app->run();
