<?php

$app->get('/register', function () use ($app) {
    $app->render('auth/register.php');
})->name('register');

$app->post('/register', function () use ($app) {
    $request = $app->request;

    $email = $request->post('email');
    $name = $request->post('name');
    $password = $request->post('password');
    $passwordConfirm = $request->post('password_confirm');

    $v = $app->validation;

    $v->validate([
        'email' => [$email, 'required|email|uniqueEmail'],
        'name' => [$name, 'required|alnumDash|max(20)|uniqueUsername'],
        'password' => [$password, 'required|min(6)'],
        'password_confirm' => [$passwordConfirm, 'required|matches(password)'],
    ]);

    if ($v->passes()){
        $app->user->create([
            'email' => $email,
            'name' => $name,
            'password' => $app->hash->password($password),
            'api_key' => md5(uniqid(rand()))
        ]);

        $app->flash('global', 'You have been registered.');
        return $app->response->redirect($app->urlFor('home'));
    }

    $app->render('auth/register.php',[
        'errors' => $v->errors(),
        'request' => $request,
    ]);

})->name('register.post');