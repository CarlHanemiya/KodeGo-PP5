<div class="frm-box" id="toggle-login-form">
    <button id="btn-cancel-reg"  onclick="btnToggleLoginForm()">x</button><br><br><br><br>
    <form id="frm-form" action="db/cruds/accLogin.php" method="POST">
        <h1>LOG IN</h1>
        <div id="txt-input">
            <input type="text" required name="logUsername">    
            <span>Username</span>
            <i></i>
        </div>
        <div id="txt-input">
            <input type="password" required name="logPass">     
            <span>Password</span>
            <i></i>
        </div>
        <input type="submit" value="Login" name="logUser">
        <div id="btn-link"> 
            <a onclick="btnToggleLogOrSignup('register')">Create an account?</a>
        </div> 
    </form>
</div>