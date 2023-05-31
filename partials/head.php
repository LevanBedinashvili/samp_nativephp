<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="ru">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Revolution RolePlay</title>
	<link rel="shortcut icon" href="./sitetemplate/revolution-logo.png" type="image/png">
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="./sitetemplate/css/libs/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./sitetemplate/css/libs/aos.css" >
	<link rel="stylesheet" type="text/css" href="./sitetemplate/css/libs/slick.min.css"/>
	<link rel="stylesheet" href="./sitetemplate/css/libs/nice-select/nice-select.css">
	<link rel="stylesheet" href="./sitetemplate/css/styles_new.css">
	<link rel="stylesheet" href="./sitetemplate/css/media_new.css">
    <link rel="stylesheet" href="//cdn.web-fonts.ge/fonts/bpg-mrgvlovani-caps/css/bpg-mrgvlovani-caps.min.css">


    <style>
        header {
            font-family: "BPG Mrgvlovani Caps", sans-serif;
        }

        body {
            font-family: "BPG Mrgvlovani Caps", sans-serif;
        }

    </style>

</head>

<body>

    <div id="app_block">
        <header>
            <div class="container">
                <div class="row">
                    <a href="index.php">
                        <div class="col-xl-2 col-lg-1 col-md-3 col-xs-3 col-3 logo">
                            <img src="./sitetemplate/revolution-logo.png" class="logo_big" alt="">
                            <img src="./sitetemplate/revolution-logo.png" class="logo_mini" alt="">
                        </div>
                    </a>
                    <div class="col-xl-7 col-lg-8 col-md-4 col-xs-2 col-2 menu">
                        <div class="mobile_menu">
                            <img src="./sitetemplate/images/icons/close.png" class="icon_close" alt="">
                        </div>

                        <ul class="nav_menu">
                            <a href="index.php">
                                <li>მთავარი</li>
                            </a>
                            <a href="howtoplay.php">
                                <li>თამაში </li>
                            </a>
                            <a href="https://www.facebook.com/groups/1265691043960289" target="_blank">
                                <li>ჯგუფი</li>
                            </a>

                            <a href="https://www.youtube.com/@-aegon9653/videos" target="_blank">
                                <li>არხი</li>
                            </a>

                            <?php 
                            if (isset($_SESSION['username'])) { ?>
                            <a href="logout.php">
                                <li>გასვლა</li>
                            </a>
                            <?php 
                            }
                        ?>

                        </ul>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-5 col-xs-7 col-7 dropdown profile">
                  
                        <?php 
                            if (isset($_SESSION['username'])) { ?>
                            <a href="profile.php" class="btn_profile" style="justify-content: center; width: 90%">
                                <img src="./sitetemplate/images/icons/user.png" alt="">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <?php } else { ?>
                            <a href="login.php" class="btn_profile" style="justify-content: center; width: 90%">
                                <img src="./sitetemplate/images/icons/user.png" alt="">
                                ავტორიზაცია
                            </a>
                            <?php
                            }
                        ?>
                     
                    </div>
                </div>
            </div>
        </header>