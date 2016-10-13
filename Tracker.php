<?php
    include("mySQL_connection.inc.php");
class Tracker
{

    
    public function __construct()
    {

    }

    public function addBanner($name, $desc, $imageLink, $directLink)
    {
        $conn =  dbConnect();


        //format the link before insert to database
//        $imageLink = str_replace('http://','',$imageLink);
//        $directLink = str_replace('http://','',$directLink);
//        $imageLink = urlencode($imageLink);
//        $directLink = urlencode($directLink);
        
        $sql = "INSERT INTO `bs1_banner` (`BannerID`, `Name`, `Desc`, `ImageLink`, `DirectLink`, `Date`, `ClickCount`) VALUES (null, '$name','$desc','$imageLink', '$directLink','".date("Y-m-d")."',0)";


        mysql_query($sql) or die(mysql_error());

        mysql_close();

    }

    public function addCampaign($name, $desc)
    {
        $conn =  dbConnect();
        

        $sql = "INSERT INTO `bs1_campaign` (`CampaignID`, `Name`,`Desc`,`Date`) VALUES (null, '$name','$desc','".date("Y-m-d")."')";

        mysql_query($sql) or die(mysql_error());

        mysql_close();
    }

    public function addUser($name, $pw)
    {
        $conn =  dbConnect();
        

        //encrypt the pw before insert
        $pw = sha1($pw);

        $sql = "INSERT INTO bs1_user(UserName, Password) VALUE ('$name','$pw')";

        mysql_query($sql) or die(mysql_error());

        mysql_close();
    }

    public function deleteBanner($bannerID)
    {
        $conn =  dbConnect();

        $sql = "DELETE FROM bs1_click WHERE BannerID = $bannerID";

        mysql_query($sql) or die(mysql_error());

        $sql = "DELETE FROM bs1_banner WHERE BannerID = $bannerID";

        mysql_query($sql) or die(mysql_error());

        mysql_close();

    }

    public function deleteCampaign($campaignID)
    {
        $conn =  dbConnect();
        

        $sql = "DELETE FROM bs1_campaign WHERE CampaignID = $campaignID";

        mysql_query($sql) or die(mysql_error());

        mysql_close();

    }

    public function deleteUser($userID)
    {
        $conn =  dbConnect();
        

        $sql = "DELETE FROM bs1_user WHERE UserID = $userID";

        mysql_query($sql) or die(mysql_error());

        mysql_close();

    }

    public function getBannerList()
    {
        $conn =  dbConnect();
        


        $sql = "SELECT * FROM bs1_banner";

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $bannerList[] = $row;
        }

        return $bannerList;
    }

    public function getCampaignList()
    {
        $conn =  dbConnect();



        $sql = "SELECT * FROM bs1_campaign";

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $campaignList[] = $row;
        }

        return $campaignList;
    }

    public function getBannersListByCampaign($campaignID)
    {
        $conn =  dbConnect();
        

        $sql = "SELECT * FROM bs1_banner WHERE bs1_banner.BannerID IN (SELECT BannerID FROM bs1_associate WHERE CampaignID = $campaignID)";

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $bannerList[] = $row;
        }

        mysql_close();

        return $bannerList;
    }

    public function getClickList($bannerID)
    {
        $conn =  dbConnect();
        

        $sql = "SELECT COUNT(*) AS ClickCount, Date FROM bs1_click WHERE BannerID = $bannerID GROUP BY Date";

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $clickList[] = $row;
        }

        mysql_close();

        return  $clickList;
    }

    public function getUserList()
    {
        $conn =  dbConnect();
        

        $sql = "SELECT * FROM bs1_user";

        $result = mysql_query($sql) or die(mysql_error());

        while($row = mysql_fetch_array($result))
        {
             $userList[] = $row;
        }

        mysql_close();

        return  $userList;
    }

    public function deleteAssociateList($campaignID)
    {
        $conn =  dbConnect();


        $sql = "DELETE FROM bs1_associate WHERE CampaignID = $campaignID";

        mysql_query($sql) or die(mysql_error());

        mysql_close();

    }
    public function associateBanner($bannerList, $campaignID)
    {
        $conn =  dbConnect();
        

        foreach($bannerList as $bannerID)
        {

            $sql = "INSERT INTO bs1_associate(BannerID, CampaignID) VALUE ($bannerID,$campaignID)";

            mysql_query($sql) or die(mysql_error());
        }
        mysql_close();
    }

    public function addClick($bannerID)
    {
        $conn =  dbConnect();
        
        //add the click to this banner record;
        $sql = "INSERT INTO bs1_click(BannerID, Date) VALUE ($bannerID,'".date("Y-m-d")."')";
        mysql_query($sql) or die(mysql_error());


        $sql = "UPDATE bs1_banner SET ClickCount = ClickCount + 1 WHERE BannerID = $bannerID";
        
        mysql_query($sql) or die(mysql_error());

        //re-direct to the direct link url of the banner
        $sql = "SELECT * FROM bs1_banner WHERE BannerID = $bannerID";
        $result = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_array($result);
        $directLink = $row['DirectLink'];

        mysql_close();

        header("Location: ".$directLink);
    }

    public function checkUser($name, $pw)
    {
        $conn =  dbConnect();
        

        //encrypt the pw before checking
        $pw = sha1($pw);
        $sql = "SELECT * FROM bs1_user WHERE UserName = '$name' AND Password = '$pw'";

        $result = mysql_query($sql) or die(mysql_error());

        if(mysql_num_rows($result))
        {
            $hasUser = true;
        }
        else
        {
            $hasUser= false;
        }

        return $hasUser;
        
        mysql_close();
    }

}


?>
