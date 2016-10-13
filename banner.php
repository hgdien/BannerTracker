
<div>
    <form method="POST" action="bannerManager.php" class="myForm" style="width: 450px;">
        <input type="hidden" name="action" value="add" />
    <table>
        <tr>
            <td>Banner Name:* </td>
            <td><input type="text" name="name" value="" maxlength="50"/></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><textarea id="desc" name="desc" cols="35" rows="5" onKeyDown="limitText(this.form.desc,400);" onKeyUp="limitText(this.form.desc,400);"></textarea></td>

        </tr>
        <tr>
            <td>Image Link:* </td>
            <td><input type="text" name="imageLink" value="" maxlength="200"/></td>
        </tr>
            <tr>
            <td>Direct Link:*</td>
            <td><input type="text" name="directLink" value="" maxlength="200"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Add New Banner" /></td>
        </tr>
        <tr>
            <td></td>
            <td><label id="message"></label></td>
        </tr>
    </table>
    </form>
</div>

<div style="margin-left: 20px;">
    <form method="POST" action="bannerManager.php" >
    <input type="hidden" name="action" value="delete" />
    <input type="hidden" name="currentID" value="" id="currentID" />
    

        <?php
            $bannerList = $myTracker->getBannerList();
            if(count($bannerList) > 0)
            {
                foreach($bannerList as $banner)
                {
                    echo "<input type='hidden' id='link".$banner['BannerID']."' value='".$banner['ImageLink']."' />";

                }

                echo '<select id="bannerList" onchange="setCurrentBanner();" size="12">';

                foreach($bannerList as $banner)
                {
                    echo "<option value='".$banner['BannerID']."'>".$banner['BannerID']." - ".$banner['Name']."</option>";

                }
                echo '</select>';
            }
            else
            {
                echo '<select id="bannerList" onchange="setCurrentBanner();" size="12"></select>';
            }
        ?>
    
    <br/>
    <input id="button" name="button" type="submit" value="Delete Banner" disabled="true"/>
    <input id="button" name="button" type="button" value="Show banner" onclick="showBanner()" disabled="true"/>
    </form>
</div>