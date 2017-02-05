<?php
    if(!isset($_SESSION))   
    {
        session_start();
    }
    if(!isset($_SESSION['id'])) 
    {
        header('Location: login.php');
    }
    include 'src/drawMessages.php';
    $user = new User();
    $user = $user->loadUserById($_SESSION['id']);
    $image = $user->getImage();
    $name = $user->getUsername();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/JavaScript" src="js/jQuery.js"></script>
    <script type="text/JavaScript" src="js/comCounter.js"></script>
    <script type="text/JavaScript" src="js/showHide.js"></script>
    <script type="text/JavaScript" src="js/counter.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Twitter</title>
</head>
<body>
    <div id="container">
        <div id="menu">
            <ul>
                    <li><form action="src/logout.php"><input type="submit" value="Wyloguj"></form></li>
                    <li><a href="myProfile.php"><button>Mój profil</button></a></li>
                    <li><a href="index.php"><button>Strona Główna</button></a></li>
                    <li><a href="messages.php"><button>Wiadomości</button></a></li>
            </ul>
            <div id="user">
                <span id="userName">Zalogowano jako:
                    <?php
                    echo $name;
                      ?>
                </span>
                <img id="userImage" src="
                <?php
                echo $image;
                ?>">
                </img>
            </div>
        </div>
        <div class="margin"></div>
        <div id="content">
            <div id="messages">
                <span id="recieved">Otrzymane Wiadomości:</span>
                <span id="sent">Wysłane wiadomości:</span>
                <table id="recievedMessages">
            <?php
                    drawMessagesByReciever($_SESSION['id']);
                ?>
                </table>
                <table id="sentMessages">
            <?php
                    drawMessagesBySender($_SESSION['id']);
                ?>
                </table>
            </div>
        </div>
        <div class="margin"></div>
    </div>
</body>
</html>