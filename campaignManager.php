<?php
    session_start();
    include("Tracker.php");
    $myTracker = new Tracker();
    $referer  = $_SERVER['HTTP_REFERER'];
    switch ($_POST['action']){
            case 'add':
                    if($_POST['name'] == "")
                    {
                        $_SESSION['message'] = "Please fill all required field (*)";
                    }
                    else
                    {
                        $myTracker->addCampaign($_POST['name'], $_POST['desc']);
                        $_SESSION['message'] = 'Add new record sucessfully.';
                    }
                    break;

            case 'delete':
                    $myTracker->deleteCampaign($_POST['currentID']);
                    $_SESSION['message'] = 'Delete record sucessfully.';
                    break;

            case 'associate':
                    $list = $_POST['bannerList'];

                    $myTracker->deleteAssociateList($_POST['currentID']);
                    if(count($list) > 0)
                    {

                        $myTracker->associateBanner($list, $_POST['currentID']);

                    }
                    else
                    {
                        $_SESSION['message'] = 'Please add at least one associated banner.';
                    }
                    break;

    }
    
    header("Location: ".$referer);
?>
