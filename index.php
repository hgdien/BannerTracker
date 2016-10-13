<?php
    session_start();
    include("Tracker.php");
    if(isset($_POST['password']) AND isset($_POST['username']))
    {
        
        $myTracker = new Tracker();
        $result = $myTracker->checkUser($_POST['username'], $_POST['password']);

        if($result)
        {
            $_SESSION['login'] = 'true';
            header("Location: adminPanel.php");
        }

    }


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Log In</title>
        <!-- Favicon -->

        <link rel="stylesheet" type="text/css" href="<?php echo $PROJECT_PATH;?>css/cover_firefox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $PROJECT_PATH;?>css/main.css" />



    </head>
    <body style="background-color: #f7f7f7; background:none;">

        <div id="loginBox">
            <form method="POST" id="passwordForm">
                <table>

                    <tr>

                            <td><div id="loginLabel"><b>UserName: </b></div></td>
                            <td><div id="loginText"><input id="username"  name="username" type="text" class="loginText" size="20" maxlength="30" /></div></td>
                    </tr>
                    <tr>

                            <td><div id="loginLabel"><b>Password: </b></div></td>
                            <td><div id="loginText"><input id="password"  name="password" type="password" class="loginText" size="20" maxlength="30" /></div></td>
                    </tr>
                    <tr>
                            <td></td>
                            <td><input type="submit" class="button" value="Log in" /></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            if($result != null AND !$result)
                            {
                                echo "Invalid Username or Password.";
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </form>
        </div>


    </body>
</html>
