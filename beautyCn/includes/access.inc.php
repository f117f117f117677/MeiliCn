<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/30
 * Time: 16:26
 */

function userIsLoggedIn()
{
    if(isset($_POST['action']) and $_POST['action'] == 'login')
    {
        if( !isset($_POST['email']) or $_POST['email'] == '' or !isset($_POST['password']) or $_POST['password'] == '')
        {
            $GLOBALS['loginError'] = '请分别填写登录邮箱与登录密码！';
            return false;
        }

        $password = md5($_POST['password'] . 'wxtcjp');

        if(databaseContainAccount($_POST['email'], $password))
        {
            session_start();
            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $password;
            return true;
        }
        else
        {
            session_start();
            unset($_SESSION['loggedIn']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $GLOBALS['loginError'] = '账户邮箱或者密码不正确！';
            return false;
        }
    }

    if(isset($_POST['action']) and $_POST['action'] == 'logout')
    {
        session_start();
        unset($_SESSION['loggedIn']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location:' . $_POST['goto']);
        exit();
    }

    session_start();
    if(isset($_SESSION['loggedIn']))
    {
        return databaseContainAccount($_SESSION['email'], $_SESSION['password']);
    }
}

function databaseContainAccount($email, $password)
{
    include 'db.inc.php';

    try{
        $sql = 'select count(*) from account where email = :email and passwd = :passwd';
        $s = $pdo->prepare($sql);
        $s->bindValue(':email', $email);
        $s->bindValue(':passwd', $password);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error searching for user By email and password when logging.';
        include 'error.html.php';
        exit();
    }

    $row = $s->fetch();

    if($row[0] > 0)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

function userHasRole($role)
{
    include 'db.inc.php';
    try
    {
        $sql = "select count(*) from account
            INNER JOIN userrole on account.usrId = userrole.usrId
            INNER JOIN role on userrole.roleId = role.roleId
            WHERE email = :email AND role.roleId = :roleId";
        $s = $pdo->prepare($sql);
        $s->bindValue(':email',$_SESSION['email']);
        $s->bindValue(':roleId',$role);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error searching for user role.';
        include 'error.html.php';
        exit();
    }

    $row = $s->fetch();

    if($row[0] > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}



