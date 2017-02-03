<?php
if(!isset($_SESSION))   
{
    session_start();
}
if(!isset($_SESSION['id'])) 
{
    header('Location: login.php');
}
include 'user.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $user= new User();
    $user = $user->loadUserById($_SESSION['id']);
    if ($_POST['name']=='') 
    {
        $name=$user->getUsername();
    }
    else
    {
        $name = $_POST['name'];
    }
    if ($_POST["email"]=='') 
    {
        $email=$user->getEmail();
    }
    else
    {
        $email = $_POST['email'];
    }
    if (!$_POST['password']=='') 
    {
        $password=$_POST['password'];
        $user->setPassword($password);
    }
    
    $image=$_POST['image'];
    $user->setImage($image);
    $user->setEmail($email);
    $user->setUsername($name);
    $user->saveToDB();
    header('Location: ../myProfile.php');
}
