<?php
include 'user.php';
include 'message.php';
function drawUserMessages($id,$rId)
{
    $user = new User();
    $user = $user->loadUserById($id);
    $messages= new Message();
    $messages = $messages->loadConversation($user->getId(),$rId);
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
            if ($sender->getId()==$id) 
            {
                $message->setRead(1);
                $message->saveToDB();
            }
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
                <div class="postText">'.$text.'</div>
            </div></td></tr>'
                 );
        }
    }
}