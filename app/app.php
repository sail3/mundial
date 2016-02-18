<?php
require __DIR__ . "/../vendor/autoload.php";

$app = new Silex\Application();

$app->register(new MUNDIAL\Providers\YamlConfigServiceProvider(__DIR__ . "/config.yml"));

$app->register(new Silex\Provider\DoctrineServiceProvider(), $app['config']['web_params']);

$app->register(new Silex\Provider\TwigServiceProvider(),array(
  "twig.path" => __DIR__ . "/../src/mumundial/View",
));

$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['debug'] = TRUE;
$app->get("/", "MUNDIAL\\Controller\\MainController::index");
$app->get("category", "MUNDIAL\\Controller\\MainController::categoryList");


return $app;
