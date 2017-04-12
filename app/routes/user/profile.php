<?php

$app->get('/u/:username', $authenticated(), function ($username) use($app)
{
    $user = $app->user->where('name', $username)->first();

    if (!$user)
    {
        $app->notFound();
    }

    $app->render('user/profile.php', [
       'user' => $user
    ]);
})->name('profile');