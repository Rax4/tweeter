<?php
include 'user.php';
include 'tweet.php';
include 'comment.php';
function drawTweetById($id)
{
    $user = new User();
    $tweets= new Tweet();
    $tweet = $tweets->loadTweetById($id);
    if ($tweet)
    {
            $comments=  drawCommentsForPost($tweet->getId());
            $user = $user->loadUserById($tweet->getUserId());
            $name = $user->getUsername();
            $image = $user->getImage();
            $text = $tweet->getText();
            $date = $tweet->getDate();
        echo('<div class="tweet">
        <div class="post">
            <div class="image"><img src="'.$image.'"></div>
            <div class="userName"><a href="showUser.php?userId='.$user->getId().'">'.$name.'</a></div>
            <div class="delete">&nbsp'.$date.'</div>
            <div class="postText">'.$text.'</div>
        </div>'.$comments.'</div>');
    }
}
function drawCommentsForPost($postId)
{
    $output='';
    $comments = new Comment();
    $user = new User();
    $comments = $comments->loadCommentByPostId($postId);
    if ($comments)
    {
        foreach ($comments as $comment) 
        {
            $user = $user->loadUserById($comment->getUserId());
            $image = $user->getImage();
            $name = $user->getUsername();
            $date = $comment->getDate();
            $text = $comment->getText();
            $output.= '
            <div class="commenty">
                    <div class="image"><img src="'.$image.'"></div>
                    <div class="userName"><a href="showUser.php?userId='.$user->getId().'">'.$name.'</a></div>
                    <div class="delete">'.$date.'</div>
                    <div class="postText">'.$text.'</div>    
                    </div>
            ';
        }
    }
    $output.='<div class="commenty"><form action="src/addComm.php" method="POST" class="newTweetForm">                
                <textarea name="comText" class="comText" maxlength="60" rows="4" cols="50"></textarea>
                <input style="display: none;"type="text" name="postId" value="'.$postId.'"></input>
                <br>
                <span class="counter"></span>
                <input type="submit" value="Dodaj nowy komentarz">
            </form></div>';
    return $output;
}