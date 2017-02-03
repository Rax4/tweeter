<?php
    if(!isset($_SESSION))   
    {
        session_start();
    }
    require 'user.php';
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        if ($_POST['name']=='' || $_POST['email']=='' || $_POST['password']==''|| !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $_SESSION['registerMsg'] ='Błąd danych!';
            header('Location: ../login.php');
        }
        else
        {
            $user= new User();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setUsername($_POST['name']);
            if ($user->saveToDB()) 
            {
                session_start();
                $_SESSION['id'] = $user->getId();
                header('Location: ../login.php');
            }
            else
            {
                $_SESSION['registerMsg'] = 'Coś poszło nie tak! Złe dane!';
                header('Location: ../login.php');
            }
        }
    }

