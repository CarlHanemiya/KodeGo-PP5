<div class="frm-box" id="toggle-profile-form">
    <button id="btn-cancel-reg"  onclick="btnToggleProfileForm()">x</button>
    <form id="frm-form" action="db/cruds.php" method="post">
        <h1>PROFILE</h1>
         <div id="txt-input">
            <input type="text" value="<?php echo $_SESSION['accFullname'] ?>" required name="profFullname">    
            <span>Fullname</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="text" value="<?php echo $_SESSION['accAddress'] ?>" required name="profAddress">    
            <span>Address</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="text" value="<?php echo $_SESSION['accDepartment'] ?>" required name="profDepartment">    
            <span>Department</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="text" value="<?php echo $_SESSION['accEmail'] ?>" required name="profUsername">    
            <span>Username</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="password" value="<?php echo $_SESSION['accpass'] ?>" required name="profPass">     
            <span>Password</span>
            <i></i>
        </div>
        <input type="submit" value="Save changes" name="profUpdate">
    </form>
</div>