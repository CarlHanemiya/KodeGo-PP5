<div class="frm-box" id="toggle-register-form">
    <button id="btn-cancel-reg"  onclick="btnToggleRegisterForm()">x</button>
    <form id="frm-form" action="db/cruds/userRegistration.php" method="POST">
        <h1>REGISTRATION</h1>
        <div id="txt-input">
            <input type="text" name="regFullname">    
            <span>Fullname</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="text" name="regUsername">    
            <span>Username</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="password" name="regPass">     
            <span>Password</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="password" name="regConfirmPass">     
            <span>Confirmed Password</span>
            <i></i>
        </div>
        <input type="submit" value="Sign Up" name="regUser">
        <div id="btn-link"> 
            <a onclick="btnToggleLogOrSignup('login')">Already have an account?</a>
        </div> 
    </form>
</div>