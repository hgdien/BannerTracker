<?php
    if(!isset($_GET['detail']))
    {
        $bannerList = $myTracker->getBannerList();
        if(count($bannerList) > 0)
        {
?>
    <div>
    <table border="2">
        <tr>
            <th>BannerID</th>
            <th>Banner Name</th>
            <th>Description</th>
            <th>Image Link</th>
            <th>Direct Link</th>
            <th>Click Count</th>
            <th>More Details</th>
        </tr>
        <?php
        $bannerList = $myTracker->getBannerList();

        foreach($bannerList as $banner)
        {
        ?><tr>
                    <td><?php echo $banner['BannerID'];?></td>
                    <td><?php echo $banner['Name'];?></td>
                    <td><?php echo $banner['Desc'];?></td>
                    <td><?php echo $banner['ImageLink'];?></td>
                    <td><?php echo $banner['DirectLink'];?></td>
                    <td style="text-align: center;"><?php echo $banner['ClickCount'];?></td>
                    <td><button onclick="window.location='adminPanel.php?detail=true&&bannername=<?php echo $banner['Name'];?>&bannerID=<?php echo $banner['BannerID'];?>';">View</button></td>
                </tr>
        <?php
        }

        ?>

    </table>
    </div>
<?php
        }
        else
        {
            echo "There are no banner available.";
        }
    }
    else
    {
       
?>
    <div>
    <h2><?php echo $_GET['bannername']?></h2>
    <?php
            $clickList = $myTracker->getClickList($_GET['bannerID']);
        if($clickList > 0)
        {
    ?>

        <table border="2">
            <tr>
                <th>Date</th>
                <th>Number of Clicks</th>
            </tr>
        <?php
            foreach($clickList as $row)
            {
                ?>      <tr>
                            <td><?php echo date('dd-mm-yyyy',strtotime($row['Date']));?></td>
                            <td style="text-align: center;"><?php echo $row['ClickCount'];?></td>
                        </tr>
                <?php
            }
            ?>

        </table>
       <?php
        }
        else
        {
            echo "There are clicks available for this banner.";
        }
        ?>

    
    </div>
<?php
    }
?>
