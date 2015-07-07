<?php
/**
 * Created by PhpStorm.
 * User: newton
 * Date: 18/6/15
 * Time: 2:12 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';
if(!userIsLoggedIn())
{
    include '../login.html.php';
    exit();
}

if(!userHasRole('Account Administrator'))
{
    $error = '对不起，只有用户管理员才能浏览此页面。';
    include '../accessdenied.html.php';
    exit();
}


if(isset($_GET['add']))
{
    include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

    $pageTitle = '添加用户';
    $action = 'addform';
    $name = '';
    $email = '';
    $id = '';
    $button = '添加用户/add user';

    //Build the list of roles
    try
    {
        $result = $pdo->query('select roleId, description from role');
    }
    catch(PDOException $e)
    {
        $error = 'Error fetching list of roles '.$e->getMessage();
        include 'error.html.php';
        exit();
    }

    foreach($result as $row)
    {
        $roles[] = array(
            'id' => $row['roleId'],
            'description' => $row['description'],
            'selected' => false
        );
    }

    include 'form.html.php';
    exit();
}

if(isset($_GET['addform']))
{
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO account SET usrname = :name, email = :email';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':email', $_POST['email']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error adding submitted user. '.$e->getMessage();
        include 'error.html.php';
        exit();
    }

    $usrId = $pdo->lastInsertId();
    if($_POST['password'] != '')
    {
        $password = md5($_POST['password'] . 'wxtcjp');
        try
        {
            $sql = 'update account set passwd = :password WHERE usrId = :usrId';
            $s = $pdo->prepare($sql);
            $s->bindValue(':password', $password);
            $s->bindValue(':usrId', $usrId);
            $s->execute();
        }
        catch(PDOException $e)
        {
            $error = 'Error setting usr password.';
            include 'error.html.php';
            exit();
        }
    }

    if(isset($_POST['roles']))
    {
        foreach($_POST['roles'] as $role)
        {
            try
            {
                $sql = 'INSERT INTO userrole SET usrId = :usrId, roleId = :roleId';
                $s = $pdo->prepare($sql);
                $s->bindValue(':usrId', $usrId);
                $s->bindValue(':roleId', $role);
                $s->execute();
            }
            catch(PDOException $e)
            {
                $error = 'Error assigning selected role to user.';
                include 'error.html.php';
                exit();
            }
        }
    }

    header('Location: .');
    exit();
}

if(isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
    try
    {
        $sql = 'SELECT usrId, usrname, email FROM account WHERE usrId = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error fetching author details.';
        include 'error.html.php';
        exit();
    }
    $row = $s->fetch();

    $pageTitle = '更新用户';
    $action = 'editform';
    $name = $row['usrname'];
    $email = $row['email'];
    $id = $row['usrId'];
    $button = '更新用户/Update user';

    //get list of roles assigned to this usr
    try
    {
        $sql = 'select roleId from userrole WHERE usrId = :usrId';
        $s = $pdo->prepare($sql);
        $s->bindValue(':usrId', $id);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error fetching list of assigned roles.';
        include 'error.html.php';
        exit();
    }

    $selectedRoles = array();
    foreach($s as $row)
    {
        $selectedRoles[] = $row['roleId'];
    }

    //Build the list of all roles
    try
    {
        $result = $pdo->query('select roleId, description from role');
    }
    catch(PDOException $e)
    {
        $error = 'Error fetching list of roles.';
        include 'error.html.php';
        exit();
    }

    foreach($result as $row)
    {
        $roles[] =array(
            'id' => $row['roleId'],
            'description' => $row['description'],
            'selected' => in_array( $row['roleId'],$selectedRoles)
        );
    }

    include 'form.html.php';
    exit();
}

if(isset($_GET['editform']))
{
    include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

    try
    {
        $sql = 'UPDATE account SET usrname = :name, email = :email where usrId = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':name', $_POST['name']);
        $s->bindValue(':email', $_POST['email']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error updating submitted user.';
        include 'error.html.php';
        exit();
    }

    //update password
    if($_POST['password'] != '')
    {
        $password = md5($_POST['password'] . 'wxtcjp');
        try
        {
            $sql = 'UPDATE account SET passwd = :password WHERE usrId = :usrId ';
            $s = $pdo->prepare($sql);
            $s->bindValue(':password', $password);
            $s->bindValue(':usrId', $_POST['id']);
            $s->execute();
        }
        catch(PDOException $e)
        {
            $error = 'Error setting user password.';
            include 'error.html.php';
            exit();
        }
    }//password

    //delete role before edit
    try
    {
        $sql = 'DELETE  FROM userrole WHERE usrId = :usrId';
        $s = $pdo->prepare($sql);
        $s->bindValue(':usrId', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error removing obsolete user role entries.';
        include 'error.html.php';
        exit();
    }//delete role

    //assign new roles to user
    if(isset($_POST['roles']))
    {
        foreach($_POST['roles'] as $role)
        {
            try
            {
                $sql = 'INSERT INTO userrole SET usrId = :usrId, roleId = :roleId ';
                $s = $pdo->prepare($sql);
                $s->bindValue('usrId', $_POST['id']);
                $s->bindValue(':roleId', $role);
                $s->execute();
            }
            catch(PDOException $e)
            {
                $error = 'Error assigning selected role to user.';
                include 'error.html.php';
                exit();
            }
        }
    }//assign new role to usr

    header('Location: .');
    exit();
}

if( isset($_POST['action']) and $_POST['action'] == 'Delete' )
{
    include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';
    try
    {
        $sql = 'DELETE FROM account WHERE usrId = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error delete account. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }

    //delete role assignments for this user
    try
    {
        $sql = 'DELETE FROM userrole WHERE usrId = :usrId';
        $s = $pdo->prepare($sql);
        $s->bindValue(':usrId', $_POST['id']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error removing account from roles. '. $e->getMessage();
        include_once 'error.html.php';
        exit();
    }
}



//display account list
include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php';

try
{
    $result = $pdo->query('select usrId, usrname from account');
}
catch (PDOException $e)
{
    $error = 'Error fetching account from the database!';
    include 'error.html.php';
    exit();
}

foreach($result as $row)
{
    $usrs[] = array('usrId' => $row['usrId'],'usrname'=>$row['usrname']);
}

include 'account.html.php';
