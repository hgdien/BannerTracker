<?php
//put the project path for redirecting paths later

//    $PROJECT_PATH = "http://localhost/BannerTracker/";
//    $SECURE_PATH = "https://localhost/BannerTracker/";

    $PROJECT_PATH = "http://www.macscds1.com.au/~scmdev1/";
    $SECURE_PATH = "https://www.macscds1.com.au/~scmdev1/";


    //set the default timezone for all function that require date() function
    date_default_timezone_set('Australia/NSW');

function dbConnect()
{
  $conn = mysql_connect('localhost',"scmdev1_u1","bA-5zTS@+!lo") or die ('Cannot connect to server');
//    $conn = mysql_connect('localhost',"root","") or die ('Cannot connect to server');

  mysql_select_db("scmdev1_db1",$conn) or die ('Cannot open database');
  return $conn;
  }

?>
