<?php
include 'tweet.php';
include 'comment.php';
include 'user.php';
if(!isset($_SESSION))   
{
    session_start();
}
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    if (!$_POST['comText']=='') 
    {
        $com = new Comment();
        $com->setText($_POST["comText"]);
        $com->setUserId($_SESSION['id']);
        $com->setPostId($_POST['postId']);
        if(!$com->saveToDB())
        {
            $_SESSION['postError'] = 'Coś się spsuło :(';
            header('Location: ../login.php');
        }
        else
        {
            header('Location: ../login.php');
        } 
    }
    else
    {
        $_SESSION['postError'] = 'Pusty komentarz :<';
        header('Location: ../login.php');
    }
}

