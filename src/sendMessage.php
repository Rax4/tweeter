<?php
if(!isset($_SESSION))   
{
    session_start();
}
if ($_SERVER['REQUEST_METHOD']=='POST') 
{
    if (!$_POST['messageText']=='') 
    {
        include 'message.php';
        $message = new Message();
        $message->setText($_POST["messageText"]);
        $message->setSenderId($_SESSION['id']);
        $message->setRecieverId($_POST['receiver']);
        if(!$message->saveToDB())
        {
            echo $_SESSION['postError'] = 'Coś się spsuło :(';
            header('Location: ../userMessages.php?userId='.$_POST['receiver'].'');
        }
        else
        {
            header('Location: ../userMessages.php?userId='.$_POST['receiver'].'');
        }    
    }
    else 
    {
        echo $_SESSION['postError'] = 'Pusta wiadomość!';
        header('Location: ../userMessages.php?userId='.$_POST['receiver'].'');
    }
}
