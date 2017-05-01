<?php

$app->get('/api_guide', function () use ($app)
{

    $app->render('user/api_guide.php');

})->name('api_guide');