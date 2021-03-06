<?php
include 'user.php';
include 'tweet.php';
include 'comment.php';
function drawTweets()
{
    $user = new User();
    $tweets= new Tweet();
    $tweets = $tweets->loadAllTweets();
    if ($tweets)
    {
        foreach ($tweets as $tweet)
        {
            $comments=  drawCommentsForPost($tweet->getId());
            $user = $user->loadUserById($tweet->getUserId());
            $name = $user->getUsername();
            $image = $user->getImage();
            $text = $tweet->getText();
            $date = $tweet->getDate();
        echo('<div class="tweet">
        <div href="showPost.php?postId='.$tweet->getId().'" class="post">
            <div class="image"><img src="'.$image.'"></div>
            <div class="userName"><a href="showUser.php?userId='.$user->getId().'">'.$name.' </a></div>
            <div class="delete">&nbsp'.$date.'</div>
            <a style="display:block" href="showPost.php?postId='.$tweet->getId().'"><div class="postText">'.$text.'</div></a>
            <div class="check"><input type="checkbox" class="showCom">Pokaz komentarze</div>
        </div>'.$comments.'</div>');
        }
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
            <div class="comments">
                    <div class="image"><img src="'.$image.'"></div>
                    <div class="userName"><a href="showUser.php?userId='.$user->getId().'">'.$name.' </a></div>
                    <div class="delete">'.$date.'</div>
                    <div class="postText">'.$text.'</div>    
                    </div>
            ';
        }
    }
    $output.='<div class="comments"><form action="src/addComm.php" method="POST" class="newTweetForm">                
                <textarea name="comText" class="comText" maxlength="60" rows="4" cols="50"></textarea>
                <input style="display: none;"type="text" name="postId" value="'.$postId.'"></input>
                <br>
                <span class="counter"></span>
                <input type="submit" value="Dodaj nowy komentarz">
            </form></div>';
    return $output;
}