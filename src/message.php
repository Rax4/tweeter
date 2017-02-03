<?php
include 'mysqlConn.php';
class Message
{
    private $id;
    private $senderId;
    private $recieverId;
    private $text;
    private $isRead;
    private $date;
    
    public function __construct() 
    {
        $this->id = -1;
        $this->senderId = '';
        $this->recieverId = '';
        $this->text = '';
        $this->date = date("Y-m-d H:i:s");
        $this->isRead = '0';
    }
    
    public function setSenderId($id)
    {
        $this->senderId = $id;
    }
    
    public function setRecieverId($id)
    {
        $this->recieverId = $id;
    }
    
    public function setText($text)
    {
        $this->text = $text;
    }
    
    public function setRead($int)
    {
        $this->isRead = $int;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getSenderId()
    {
        return $this->senderId;
    }
    
    public function getRecieverId()
    {
        return $this->recieverId;
    }
    
    public function getText()
    {
        return $this->text;
    }
    
    public function getRead()
    {
        return $this->isRead;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Messages(sender_id, reciever_id, text, date, is_read) VALUES (?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->senderId,  $this->recieverId,  $this->text,  "$this->date",  $this->isRead]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Messages SET sender_id=?,reciever_id=?,text=?,date=?,is_read=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->senderId,  $this->recieverId,  $this->text,  "$this->date",  $this->isRead, $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        var_dump($stm->errorInfo());
        return false;
    }
    
    static public function loadMessageById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Messages WHERE id=$id ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedMessage = new Message();
            $loadedMessage->id = $row['id'];
            $loadedMessage->senderId = $row['sender_id'];
            $loadedMessage->recieverId = $row['reciever_id'];
            $loadedMessage->date = $row['date'];
            $loadedMessage->text = $row['text'];
            $loadedMessage->isRead = $row['is_read'];
            return $loadedMessage;
        }
        return null;
    }
    
    static public function loadMessageBySenderId($id)
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Messages WHERE sender_id=$id ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->recieverId = $row['reciever_id'];
                $loadedMessage->date = $row['date'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->isRead = $row['is_read'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }
    
    static public function loadConversation($sender,$receiver)
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Messages WHERE (sender_id=$sender AND reciever_id=$receiver) OR (sender_id=$receiver AND reciever_id=$sender) ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->recieverId = $row['reciever_id'];
                $loadedMessage->date = $row['date'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->isRead = $row['is_read'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }
    
    static public function loadMessageByRecieverId($id)
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Messages WHERE reciever_id=$id ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->recieverId = $row['reciever_id'];
                $loadedMessage->date = $row['date'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->isRead = $row['is_read'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }
    
    static public function loadAllMessages()
    {
        global $conn;
        $ret = [];
        $sql = "SELECT * FROM Messages ORDER BY date DESC";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() > 0)
        {
            foreach($result as $row)
            {
                $loadedMessage = new Message();
                $loadedMessage->id = $row['id'];
                $loadedMessage->senderId = $row['sender_id'];
                $loadedMessage->recieverId = $row['reciever_id'];
                $loadedMessage->date = $row['date'];
                $loadedMessage->text = $row['text'];
                $loadedMessage->isRead = $row['is_read'];
                $ret[] = $loadedMessage;
            }
            return $ret;
        }
        return null;
    }
}