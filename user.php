<?php

?>
<div>
    <form method="POST" action="userManager.php" class="myForm" style="width: 450px;">
        <input type="hidden" name="action" value="add" />
    <table>
        <tr>
            <td>User Name: </td>
            <td><input type="text" name="name" value="" maxlength="50"/></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="pw" value="" maxlength="50"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Add New User" /></td>
        </tr>
    </table>
    </form>
</div>

<div>
    <form method="POST" action="userManager.php" class="myForm">
    <input type="hidden" name="action" value="delete" />
    <input type="hidden" name="currentID" value=""  id="currentID"/>

    <select id="userList" onchange="setCurrentUser();" size="12">

        <?php
            $userList = $myTracker->getUserList();

            foreach($userList as $user)
            {
                echo "<option value='".$user['UserID']."'>".$user['UserName']."</option>";
            }
        ?>
    </select>
    <br/>
    <input type="submit" name="button" value="Remove User" disabled="true"/>
    </form>
</div>

<div>

</div>