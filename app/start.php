<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Noodlehaus\Config;
use Options\User\User;
use Options\User\Device;
use Options\User\Type;
use Options\User\DeviceValue;
use Options\Helpers\Hash;
use Options\Validation\Validator;
use Options\Middleware\BeforeMiddleware;
use Options\Middleware\CsrfMiddleware;
use RandomLib\Factory as RandomLib;

session_cache_limiter(false);
session_start();

ini_set('display_errors','On');

define('INC_ROOT',dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
    'mode' => file_get_contents(INC_ROOT . '/mode.php '),
    'view' => new Twig(),
    'templates.path' => INC_ROOT . '/app/views'
]);

$app->add(new BeforeMiddleware);
//$app->add(new CsrfMiddleware);

$app->configureMode($app->config('mode'),function () use ($app){
    $app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});


require 'config/database.php';
require 'filters.php';
require 'routes.php';


$app->auth = false;

$app->container->set('user',function (){
   return new User;
});

$app->container->set('device',function (){
    return new Device;
});

$app->container->set('type',function (){
    return new Type;
});

$app->container->set('device_value',function (){
    return new DeviceValue;
});

$app->container->singleton('hash',function () use ($app){
   return new Hash($app->config);
});

$app->container->singleton('validation',function () use ($app){
    return new Validator($app->user, $app->hash, $app->auth);
});

$app->container->singleton('randomlib',function () {
    $factory = new RandomLib;
    return $factory->getMediumStrengthGenerator();
});

$view = $app->view();

$view->parserOptions = [
    'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
    new TwigExtension
];


