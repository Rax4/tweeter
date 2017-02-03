<?php
include 'mysqlConn.php';
class Comment 
{
    private $id;
    private $userId;
    private $postId;
    private $text; 
    private $creationDate;
    
    public function __construct() 
    {
        $this->id=-1;
        $this->userId='';
        $this->postId='';
        $this->text='';
        $this->creationDate = date("Y-m-d H:i:s");
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getPostId()
    {
        return $this->postId;
    }
    
    public function getText()
    {
        return $this->text;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getDate()
    {
        return $this->creationDate;
    }
    
    public function setUserId($id)
    {
        $this->userId = $id;
    }
    
    public function setPostId($id)
    {
        $this->postId = $id;
    }
    
    public function setText($text)
    {
        $this->text="$text";
    }
    
    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Comments(user_id, post_id, text, date) VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->userId, $this->postId,  $this->text,  "$this->creationDate"]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Comments SET post_id=?,user_id=?,text=?,date=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->postId, $this->userId,  "$this->text",  "$this->creationDate",  $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    
    static public function loadCommentById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Comments WHERE id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedComment = new Comment();
            $loadedComment->id = $row['id'];
            $loadedComment->userId = $row['user_id'];
            $loadedComment->postId = $row['post_id'];
            $loadedComment->text = $row['text'];
            $loadedComment->creationDate = $row['date'];
            return $loadedComment;
        }
        return null;
    }
    
    static public function loadCommentByPostId($id)
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Comments WHERE post_id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->userId = $row['user_id'];
                $loadedComment->postId = $row['post_id'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['date'];
                $ret[] = $loadedComment;
            }
            return $ret;
        }
        return null;
    }
    
    static public function loadAllComments()
    {
        global $conn;
        $sql = "SELECT * FROM Comments";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedComment = new Comment();
                $loadedComment->id = $row['id'];
                $loadedComment->userId = $row['user_id'];
                $loadedComment->text = $row['text'];
                $loadedComment->creationDate = $row['date'];
                $ret[] = $loadedComment;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Comments WHERE id=$this->id";
            $result = $conn->query($sql);
            if($result == true)
            {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
}