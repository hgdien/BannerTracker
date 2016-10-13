<div>
    <div id="campainPage1">
        <div>
            <form method="POST" action="campaignManager.php" class="myForm" style="width: 450px;">
                <input type="hidden" name="action" value="add" />
            <table>
                <tr>
                    <td>Campaign Name:* </td>
                    <td><input type="text" name="name" value="" maxlength="50"/></td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td><textarea id="desc" name="desc" cols="35" rows="5" onKeyDown="limitText(this.form.desc,400);" onKeyUp="limitText(this.form.desc,400);"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Add New Campaign" /></td>
                </tr>
            </table>
            </form>
        </div>

        <div>
            <form method="POST" action="campaignManager.php" >
            <input type="hidden" name="action" value="delete" />
            <input type="hidden" name="currentID" value="" id="currentID"/>

            <?php
                $campaignList = $myTracker->getCampaignList();

                echo '<select id="campaignList" onchange="setCurrentCampaign();" size="12">';
                foreach($campaignList as $campaign)
                {
                    echo "<option value='".$campaign['CampaignID']."'>".$campaign['Name']." created on ".date('d-m-Y', strtotime($campaign['Date']))."</option>";

                }
                echo '</select>';
            ?>
           
            <input type="submit" name="button" value="Delete campaign" disabled="true"/>
            <input type="button" name="button" value="Show associate list" onclick="getBannerList()" disabled="true"/>
            <input type="button" name="button" value="Associate Banners" onclick="showAssociationBox()" disabled="true"/>
            </form>
        </div>

        <div style="border: 1px solid #c4c4c4;" id="bannerListBox">
        </div>
    </div>

    <div id="campainPage2" style="display:none;">
        <h3 id="campaignName"></h3>

        <div style="float:left;">
            <h5>List of all Banners</h5>

                <?php
                $bannerList = $myTracker->getBannerList();
                if(count($bannerList) > 0)
                {
                    echo '
                        <table border="2">
                            <tr>
                                <th>BannerID</th>
                                <th>Banner Name</th>
                                <th>Banner Image</th>
                                <th>Click Details</th>
                                <th>Add to Associate List</th>
                            </tr>';
                    foreach($bannerList as $banner)
                    {
                    ?><tr>
                                <td><?php echo $banner['BannerID'];?></td>
                                <td><?php echo $banner['Name'];?></td>
                                <td><button onclick="window.open('<?php echo $banner['ImageLink'];?>','','scrollbars=no,menubar=no,height=600,width=800,resizable=yes,toolbar=no,location=no,status=no');">Show</button></td>
                                <td><button onclick="window.location='adminPanel.php?detail=true&&bannername=<?php echo $banner['Name'];?>&bannerID=<?php echo $banner['BannerID'];?>';">View</button></td>
                                <td><button onclick="associateBanner('<?php echo $banner['Name'];?>',<?php echo $banner['BannerID'];?>)">Add</button></td>
                            </tr>
                    <?php
                    
                    }

                    echo '</table>';
                }
                else
                {
                    echo "There are no banner available.";
                }
                ?>

            
        </div>

        <form method="POST" action="campaignManager.php" id="associateForm">
            <input type="hidden" name="action" value="associate" />
            <input type="hidden" name="currentID" value="" id="campaignID"/>
            <div style="float:left; margin-left: 50px;">
                <h5>Associated Banners</h5>
                <div id="associatedList"></div>
                <input type="button" id="removeButton" onclick="removeAssociate()" disabled="true" value="Remove Banner"/>
            </div>
        <br/>

        <input type="button" value="Save Association" onclick="submitAssociate()" style="position: absolute; bottom: 100px; left: 200px;"/>
        </form>

    </div>


</div>