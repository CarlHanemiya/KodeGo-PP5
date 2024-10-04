<?php
include 'db/connection.php';
session_start();  
date_default_timezone_set("Asia/Manila");
$title = (isset($_GET['con']) && $_GET['con'] != '') ? $_GET['con'] : 'HOME';
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLMS - <?php echo strtoupper($title); ?> </title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/nav-style.css">
    <link rel="stylesheet" href="css/form-style2.css">
    <link rel="stylesheet" href="css/admin-navigator-style.css">
    <link rel="stylesheet" href="css/admin-style.css">
    <link rel="stylesheet" href="css/admin-dashboard.css">
    <link rel="stylesheet" href="css/admin-add-book1.css">
    <link rel="stylesheet" href="css/admin-book.css">
    <link rel="stylesheet" href="css/user-style1.css">
    <link rel="stylesheet" href="css/user-sidepanel1.css">
    <link rel="stylesheet" href="css/user-home-style1.css">
    <link rel="stylesheet" href="css/user-book-info.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.jpg"> 
</head>
<body>
    <div id="toggle-bg-disabler"></div>
    <?php 
        require_once("navigator.php");
    ?>
    <div class="content"> <?php
        if(isset($_SESSION['logStatus']) && $_SESSION['logStatus'] == "true" ) {
            if($_SESSION['accType'] == 'Admin'){
                include_once("admin/admin.php");
            } else if($_SESSION['accType'] == 'User'){
                include_once("user/user.php");
            } else {
                # IF ACCOUNT TYPE IS UNKNOWN	
                session_start();
                session_destroy();
                sleep(1);
                header("Location: index.php?acc=invalid");
                exit();
            }
        } else { ?>
            <div class="con-bg"></div> <?php
            include_once("content.php");
        } ?> 
    </div>
    <?php
		require_once("pg/copyright.php");
        include_once("profile.php");
        include_once("msg.php");
    ?>
    <script type="text/javascript" src="js/toggleForm.js"> </script> <?php
    if(isset($_GET['fform'])) {
        $form = $_GET['fform'];
        switch ($form) {
            case 'signup':
                echo "<script>btnToggleRegisterForm()</script>";
                break;

            case 'borrreq':
                echo "<script>btnToggleBookRequestForm()</script>";
                break;

            case 'login':
                echo "<script>btnToggleLoginForm()</script>";
                break;

            case 'profile':
                echo "<script>btnToggleProfileForm()</script>";
                break;
        }
      } ?>
</body> 
</html>
