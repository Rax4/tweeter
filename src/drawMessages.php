<?php
include 'user.php';
include 'message.php';
function drawMessagesByReciever($id)
{
    $user = new User();
    $user = $user->loadUserById($id);
    $messages= new Message();
    $messages = $messages->loadMessageByRecieverId($user->getId());
    if ($messages)
    {
        foreach ($messages as $message)
        {
            $sender = $user->loadUserById($message->getSenderId());
            $receiver = $user->loadUserById($message->getRecieverId());
            $senderName = $sender->getUsername();
            $receiverName = $receiver->getUsername();
            $senderImage = $sender->getImage();
            $receiverImage = $receiver->getImage();
            $read = $message->getRead();
            $text = $message->getText();
            $date = $message->getDate();
            $isRead = '';
            if ($read==0) 
            {
                $isRead='style="background-color:green;"';
            }
            echo('
                <tr><td>
            <div class="message"'.$isRead.'>
                <div class="senderImage"><img src="'.$senderImage.'"></div>
                <div class="senderName"><a href="showUser.php?userId='.$sender->getId().'">'.$senderName.'</a></div>
                <div class="receiverImage"><img src="'.$receiverImage.'"></div>
                <div class="receiverName"><a href="showUser.php?userId='.$receiver->getId().'">'.$receiverName.'</a></div>
                <div class="delete">&nbsp'.$date.'</div>
                <a style="display:block" href="userMessages.php?userId='.$sender->getId().'"><div class="postText">'.$text.'</div></a>
            </div></td></tr>'
                 );
        }
    }
}

function drawMessagesBySender($id)
{
    $user = new User();
    $user = $user->loadUserById($id);
    $messages= new Message();
    $messages = $messages->loadMessageBySenderId($user->getId());
    if ($messages)
    {
        foreach ($messages as $message)
        {
            $sender = $user->loadUserById($message->getSenderId());
            $receiver = $user->loadUserById($message->getRecieverId());
            $senderName = $sender->getUsername();
            $receiverName = $receiver->getUsername();
            $senderImage = $sender->getImage();
            $receiverImage = $receiver->getImage();
            $text = $message->getText();
            $date = $message->getDate();
            $read = $message->getRead();
            $isRead = '';
            if ($read==0) 
            {
                $isRead='style="background-color:green;"';
            }
            echo('
                <tr><td>
            <div class="message"'.$isRead.'>
                <div class="senderImage"><img src="'.$senderImage.'"></div>
                <div class="senderName"><a href="showUser.php?userId='.$sender->getId().'">'.$senderName.'</a></div>
                <div class="receiverImage"><img src="'.$receiverImage.'"></div>
                <div class="receiverName"><a href="showUser.php?userId='.$receiver->getId().'">'.$receiverName.'</a></div>
                <div class="delete">&nbsp'.$date.'</div>
                <a style="display:block" href="userMessages.php?userId='.$receiver->getId().'"><div class="postText">'.$text.'</div></a> 
            </div></td></tr>'
                 );
        }
    }
}
