<?php
include 'mysqlConn.php';
class Tweet 
{
    private $id;
    private $userId;
    private $text; 
    private $creationDate;
    
    public function __construct() 
    {
        $this->id=-1;
        $this->userId='';
        $this->text='';
        $this->creationDate = date("Y-m-d H:i:s");
    }

    public function getUserId()
    {
        return $this->userId;
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
    
    public function setText($text)
    {
        $this->text="$text";
    }
    
    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Tweets(user_id, text, date) VALUES (?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->userId,  $this->text,  "$this->creationDate"]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Tweets SET user_id=?,text=?,date=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->userId,  "$this->text",  "$this->creationDate",  $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    
    static public function loadTweetById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Tweets WHERE id=$id ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['user_id'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['date'];
            return $loadedTweet;
        }
        return null;
    }
    
    static public function loadTweetByUserId($id)
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Tweets WHERE user_id=$id ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['user_id'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['date'];
                $ret[] = $loadedTweet;
            }
            return $ret;
        }
        return null;
    }
    
    static public function loadAllTweets()
    {
        global $conn;
        $sql = "SELECT * FROM Tweets ORDER BY date DESC";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['user_id'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['date'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Tweets WHERE id=$this->id";
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
