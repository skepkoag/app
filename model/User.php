<?php

class User
{
    public $id;
    public $name;
    public $avatar;
    public $login;
    private $password;

    public function setPassword($password)
        {
        $this->password = md5($password . 'HA(S&SVA(DV^(&*d');
        }

    public static function add(user $user)
    {
        $pdo = DB::getInstance()->getPdo();
        $stmt = $pdo->prepare('INSERT INTO user
    (name,login,password)
    VALUES (?,?,?)');
        $stmt->execute([
            $user->name,
            $user->login,
            $user->password,
        ]);

    }
    public static function findByLogin($login,$password)
    {
        $pdo = DB::getInstance()->getPdo();
        $stmt = $pdo->prepare('SELECT id, name,avatar,login FROM USER 
      WHERE login = ? AND password = ?');
        $stmt->execute(
            [
                $login,
                self::getHash($password),
            ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $user =new User;
            $user->id =$row['id'];
            $user->name =$row['name'];
            $user->login = $row['login'];
            $user->avatar = $row['avatar'];
            return $user;
        }
        return null;
    }
    public static function current () {
        if (!isset($_SESSION['user_id']) || !$_SESSION['user_id']) {
            return null;
        }
        $pdo = DB::getInstance()->getPdo();
        $stmt = $pdo->prepare('SELECT id, name,avatar,login FROM USER 
      WHERE id = ?');
        $stmt->execute(
            [
                $login,
                self::getHash($password),
            ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $user =new User;
            $user->id =$row['id'];
            $user->name =$row['name'];
            $user->login = $row['login'];
            $user->avatar = $row['avatar'];
            return $user;
        }
        return null;
    }
}
