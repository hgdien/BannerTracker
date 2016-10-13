<?php
    if(isset($_GET['bannerID']) AND is_numeric($_GET['bannerID']))
    {
        include("Tracker.php");
        $myTracker = new Tracker();
        $myTracker->addClick($_GET['bannerID']);

    }


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        
        <?php
        if(isset($_GET['bannerID']) AND is_numeric($_GET['bannerID']))
        {
            echo "...Loading";
        }
        else
        {
            echo "Oops ! The page you are trying to access is not existed. Please re-check your BannerID.";
        }
        // put your code here
        ?>
    </body>
</html>
