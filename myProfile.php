<?php
    if(!isset($_SESSION))   
    {
        session_start();
    }
    if(!isset($_SESSION['id'])) 
    {
        header('Location: login.php');
    }
    include 'src/drawUserTweets.php';
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
    <script type="text/JavaScript" src="js/editMenu.js"></script>
    <script type="text/JavaScript" src="js/counter.js"></script>
    <script type="text/JavaScript" src="js/avatar.js"></script>
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
                <span id="userName">
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
        <div class="margin">
            <ul>
                    <li><button id="editBtn">Edytuj Profil</button></li>
                    <li><a href="messages.php"><button id="editBtn">Wiadomości</button></a></li>
            </ul>
        </div>
        <div id="content">
            <form id="editMenu" style ="display: none;"action="src/editUser.php" method="POST">
                    <table id="register">
                        <tr>
                            <td><label for="name">Imię:</label></td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="text" name="email"></td>
                        </tr>
                        <tr>
                            <td><label for="password">Hasło:</label></td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td><label for="image">Obrazek:</label></td>
                            <td>
                                <select name="image" id="options">
                                    <option value="img/default.jpeg">Default</option>
                                    <option value="img/mariusz.jpg">Mariusz</option>
                                    <option value="img/peja.jpg">Peja</option>
                                    <option value="img/ropowicz.jpg">Ropowicz</option>
                                    <option value="img/strzelba.jpg">Strzelba</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <input style="display: block;" type="submit" value="Zmień dane">
                        </tr>
                    </table>
            </form>
            <div id="avatar"></div>
            Twoje posty:<br><?php
            drawUserTweets($_SESSION['id']);
            ?>
        </div>
        <div class="margin"></div>
    </div>
</body>
</html>