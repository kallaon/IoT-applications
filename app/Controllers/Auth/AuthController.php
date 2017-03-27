<?php
namespace App\Controllers\Auth;
use App\Models\Device;
use App\Models\Type;
use App\Models\User;
use App\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Respect\Validation\Validator as v;
use Slim\App as app;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthController extends Controller
{
    public function getSignOut($request, $response)
    {
        $this->auth->logout();
        return $response->withRedirect($this->router->pathFor('home'));
    }
    public function getSignIn($request, $response)
    {
        return $this->view->render($response,'auth/signin.twig');
    }
    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('name'),
            $request->getParam('password')
        );
        if (!$auth)
        {
            $this->flash->addMessage('error','Could not sign in with those details');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));
    }
    public function getSignUp($request, $response)
    {
        return $this->view->render($response,'auth/signup.twig');
    }
    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::noWhitespace()->notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);
        if ($validation->failed())
        {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'),PASSWORD_DEFAULT),
            'api_key' => md5(uniqid(rand())),                                                           // TUUUUUUUUUUUUUUUUUUUUUUUUUU
        ]);
        $this->flash->addMessage('info','You have been signed up!');
        $this->auth->attempt($user->name,$request->getParam('password'));
        return $response->withRedirect($this->router->pathFor('home'));
    }

    //////////////////////////////// DEVICE

    public function getAddDevice($request, $response)
    {
       // $types = Type::table('type')->select('device_name');
        // = db::table('type')->get();
        $types = Capsule::table('type')->get();
        var_dump($types);
        return $this->view->render($response,'auth/add.twig',['types' => $types]);
    }
    public function postAddDevice($request, $response)
    {

        $validation = $this->validator->validate($request, [
            //'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::noWhitespace()->notEmpty(),
            //'password' => v::noWhitespace()->notEmpty(),
        ]);
        if ($validation->failed())
        {
            return $response->withRedirect($this->router->pathFor('home'));
        }
        $user = Device::create([
            'device_name' => $request->getParam('name'),
            'id_type' => $request->getParam('menu-type'),
            'user_id' =>  $_SESSION['user'],
        ]);
        $this->flash->addMessage('info','Device has been added!');
        //$this->auth->attempt($user->name,$request->getParam('password'));
        return $response->withRedirect($this->router->pathFor('home'));



    }
}