<?php
        include("Tracker.php");
        $myTracker = new Tracker();
        $campaignBanners = $myTracker->getBannersListByCampaign($_GET['campaignID']);

        if($_GET['type']=='full')
        {
            if(count($campaignBanners) > 0)
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
                    <th>More Details</th>
                </tr>
                <?php
                foreach($campaignBanners as $banner)
                {
                ?><tr>
                            <td><?php echo $banner['BannerID'];?></td>
                            <td><?php echo $banner['Name'];?></td>
                            <td><?php echo $banner['Desc'];?></td>
                            <td><?php echo $banner['ImageLink'];?></td>
                            <td><?php echo $banner['DirectLink'];?></td>
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

            echo "<select id='associateListBox' name='bannerList[]' onchange='enableRemove()' size='12' multiple>";
            foreach($campaignBanners as $banner)
            {
                echo "<option value='".$banner['BannerID']."'>".$banner['BannerID']." - ".$banner['Name']."</option>";
            }
            echo "</select>";

        }

?>