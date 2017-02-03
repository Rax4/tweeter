<?php
    if(!isset($_SESSION))   
    {
        session_start();
    }
include 'user.php';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    if($_POST['email']=='' || $_POST['password']=='')
    {
        echo('Błąd danych!');
    }
    else
    {
        $user = new User();
        $password = $_POST['password'];
        $email = $_POST['email'];
        if ($user = $user->loadUserByEmail($email)) 
        {
            if (password_verify($password,$user->getPassword())) 
            {
                session_start();
                $_SESSION['id'] = $user->getId();
                header('Location: ../login.php');
            }
            else
            {
                $_SESSION['loginMsg']='Błędne hasło!';
                header('Location: ../login.php');
            }
        }
        else
        {
            $_SESSION['loginMsg']='Błędny adres email!';
            header('Location: ../login.php');
        }
    }   
}