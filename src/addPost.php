<?php
if(!isset($_SESSION))   
{
    session_start();
}
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    if (!$_POST['tweetText']=='') 
    {
        include 'tweet.php';
        $tweet = new Tweet();
        $tweet->setText($_POST["tweetText"]);
        $tweet->setUserId($_SESSION['id']);
        if(!$tweet->saveToDB())
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
        $_SESSION['postError'] = ('Pusty post :<');
        header('Location: ../login.php');
    }
}