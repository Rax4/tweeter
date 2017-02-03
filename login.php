<?php
    if(!isset($_SESSION))   
    {
        session_start();
    }
    if(isset($_SESSION['id'])) 
    {
        header('Location: index.php');
    } 
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/JavaScript" src="js/jQuery.js"></script>
    <script type="text/JavaScript" src="js/showHide.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Twitter</title>
</head>
<body>
    <div id="logins">
    <form action="src/login.php" method="post">
        Zaloguj się:
        <table id="login">
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><label for="password">Hasło:</label></td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <input type="submit" value="Zaloguj">
        <?php
        if (isset($_SESSION['loginMsg'])) 
        {
            echo($_SESSION['loginMsg']);   
            unset($_SESSION['loginMsg']);
        }
         ?>
    </form>
    <span>Nowy użytkownik:<input type="checkbox" class="showHide"></span>
    <form action="src/register.php" method="post" style="display:none;">
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
        </table>
        <input type="submit" value="Zarejstruj">
        <?php
        if (isset($_SESSION['registerMsg'])) 
        {
            echo($_SESSION['registerMsg']);   
            unset($_SESSION['registerMsg']);
        }
         ?>
  </form>
  </div>
</body>
</html>