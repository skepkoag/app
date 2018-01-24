<?php

class UserController
{
    public function regAction()
    {
        return render('user/reg');
    }

    public function regDataAction()
    {
        //var_dump($_POST);
        //die;
        require_once '../model/User.php';
        $user = new User;
        $user->name=$_POST['name'];
        $user->login=$_POST['login'];
        $user->setPassword($_POST['password']);
        User::add($user);

    }
    public function indexAction()
    {
        require_once '../model/User.php';
        $user = User::current();
        if ($user) {
            return render('user/index', [
                'user' => $user
            ]);
        } else {
            return render('user/form');
        }

    }
    public function loginAction()
    {
        require_once '../model/User.php';
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = User::findByLogin($login,$password);
            if ($user)
             {
            $_SESSION['user_id'] = $user->id;
            }
        return render('user/login', [
            'user'=>$user,
        ]);
    }
}