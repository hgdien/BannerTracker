<?php
    session_start();
//    echo $_SESSION['message'];
    if(!isset($_SESSION['login']))
    {
        header("Location: index.php");
    }
    include("Tracker.php");
    $myTracker = new Tracker();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $_GET['pageType']?></title>

	<meta http-equiv="imagetoolbar" content="no" />

        <link rel="stylesheet" type="text/css" href="css/main.css" />


	<script type="text/javascript" src="main.js"></script>


</head>

<body>

    <img alt="logo" src="southern_cross_media360.png" width="150" height="100" />
	<div id="header">
            <ul>
                <li><a href="adminPanel.php">Banner Statistic</a></li>
                <li><a href="adminPanel.php?pageType=Manage Banner">Manage Banner</a></li>
                <li><a href="adminPanel.php?pageType=Manage Campaign">Manage Campaign</a></li>
                <li><a href="adminPanel.php?pageType=Manage User">Manage User</a></li>
            </ul>
        </div>

        <div id="content">
            <?php
                if(!isset($_GET['pageType']))
                {
                    include('statistic.php');
                }
                else if($_GET['pageType'] == 'Manage Banner')
                {
                    include('banner.php');
                }
                else if($_GET['pageType'] == 'Manage Campaign')
                {
                    include('campaign.php');
                }
                else if($_GET['pageType'] == 'Manage User')
                {
                    include('user.php');
                }
            ?>
        </div>

	<div id="footer">
            <p>Banner Tracker by <b>Hung Gia Dien</b> 2010</p>
	</div>

        <?php
        if(isset($_SESSION['message']))
        {
//        echo $_SESSION['message'];
            ?>
            <script type="text/javascript">
                alert("<?php echo $_SESSION['message'];?>");
            </script>
            <?php
            unset ($_SESSION['message']);
        }

        ?>
</body>
</html>
