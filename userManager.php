<?php
    session_start();
    include("Tracker.php");
    $myTracker = new Tracker();
    $referer  = $_SERVER['HTTP_REFERER'];
    switch ($_POST['action']){
            case 'add':
                    if($_POST['name'] == "" OR $_POST['pw']== "")
                    {
                        $_SESSION['message'] = "Please fill all required field.";
                    }
                    else
                    {
                        $myTracker->addUser($_POST['name'], $_POST['pw']);
                        $_SESSION['message'] = 'Add new record sucessfully.';
                    }

                    break;

            case 'delete':
                    $myTracker->deleteUser($_POST['currentID']);
                    $_SESSION['message'] = 'Delete record sucessfully.';
                    break;


    }
    header("Location: ".$referer);
?>
