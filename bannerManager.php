<?php
    session_start();
    include("Tracker.php");
    $myTracker = new Tracker();
    $referer  = $_SERVER['HTTP_REFERER'];
    switch ($_POST['action']){
            case 'add':
                    if($_POST['name'] == "" OR $_POST['imageLink'] == "" OR $_POST['directLink'] == "")
                    {
                        $_SESSION['message'] = "Please fill all required field (*)";
                    }
                    else
                    {
                        $myTracker->addBanner($_POST['name'], $_POST['desc'], $_POST['imageLink'], $_POST['directLink']);
                         $_SESSION['message'] = 'Add new record sucessfully.';
                    }
                    break;

            case 'delete':
                    $myTracker->deleteBanner($_POST['currentID']);
                     $_SESSION['message'] = 'Delete record sucessfully.';
                    break;


    }
   
    header("Location: ".$referer);

?>
