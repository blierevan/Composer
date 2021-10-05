<?php
require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$logger = new Logger('main');

$logger->pushHandler( new StreamHandler(__DIR__. '/../log/app.log', Logger::DEBUG));
$logger->info('First message');
$logger->debug('2 ième message');

print('ok <br/>');

$loader = new FilesystemLoader('../templates');

print("2) OK <br/>");

$Twig = new Environment($loader,['cache' =>'../cache']);

print("3) OK <br/>");

echo $Twig->render('base.html.twig',
[
    'title' => 'Liste des utilisateurs',
    'text' => $manager-getAll(),
]);