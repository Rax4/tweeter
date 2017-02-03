<?php
include 'mysqlConn.php';
class User 
{
    private $id;
    private $username;
    private $hashedPassword;
    private $email;
    private $image;
    public function __construct() 
    {
        $this->id = -1;
        $this->username = "";
        $this->email = "";
        $this->hashedPassword = "";
        $this->image= 'img/default.jpeg ';
    }
    public function setPassword($newPassword)
    {
        $newHashedPassword =
        password_hash($newPassword,PASSWORD_BCRYPT);
        $this->hashedPassword =
        $newHashedPassword;
    }
    public function setUsername($name)
    {
        $this->username =$name;
    }
    public function setEmail($email)
    {
        $this->email =$email;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getPassword()
    {
        return $this->hashedPassword;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getId()
    {
        return $this->id;
    }
    public function saveToDB()
    {
        global $conn;
        if($this->id == -1)
        {
            $sql = "INSERT INTO Users(username, email, hashed_password,image)
            VALUES (?,?,?,?)";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->username,  $this->email,  $this->hashedPassword, $this->image]);
            if($result == true)
            {
                $this->id = $conn->lastInsertId();
                return true;
            }
        }
        else 
        {
            $sql = "UPDATE Users SET username=?,email=?,hashed_password=?,image=?WHERE id=?";
            $stm = $conn->prepare($sql);
            $result = $stm->execute([$this->username,  $this->email,  $this->hashedPassword,  $this->image,  $this->id]);
            if($result == true)
            {
                return true;
            }
        }
        return false;
    }
    static public function loadUserById($id)
    {
        global $conn;
        $sql = "SELECT * FROM Users WHERE id=$id";
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() == 1)
        {
            $row = $result->fetch();
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashedPassword = $row['hashed_password'];
            $loadedUser->email = $row['email'];
            $loadedUser->image = $row['image'];
            return $loadedUser;
        }
        return null;
    }
    static public function loadUserByEmail($email)
    {
        global $conn;
        $sql = "SELECT * FROM Users WHERE email=?";        
        $stm = $conn->prepare($sql);
        $result = $stm->execute(["$email"]);
        if($result == true && $stm->rowCount() == 1)
        {
            $row = $stm->fetch();
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->username = $row['username'];
            $loadedUser->hashedPassword = $row['hashed_password'];
            $loadedUser->email = $row['email'];
            $loadedUser->image = $row['image'];
            return $loadedUser;
        }
        return null;
    }
    static public function loadAllUsers()
    {
        global $conn;
        $sql = "SELECT * FROM Users";
        $ret = [];
        $result = $conn->query($sql);
        if($result == true && $result->rowCount() != 0)
        {
            foreach($result as $row)
            {
                $loadedUser = new User();
                $loadedUser->id = $row['id'];
                $loadedUser->username = $row['username'];
                $loadedUser->hashedPassword = $row['hashed_password'];
                $loadedUser->email = $row['email'];
                $loadedUser->image = $row['image'];
                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }
    public function delete()
    {
        global $conn;
        if($this->id != -1)
        {
            $sql = "DELETE FROM Users WHERE id=$this->id";
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
