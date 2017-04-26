<?php

$app->get('/user_guide', function () use ($app)
{

    $app->render('user/user_guide.php');

})->name('user_guide');