<?php 
$display =  (isset($_GET['con']) && $_GET['con'] != '') ? $_GET['con'] : '';
switch ($display) {
	case 'services' : 
		include_once("services.php");
	    break;

	case 'about' : 
		include_once("about.php");
	    break;

	case 'login' : 
		include_once("login.php");
	    break;

	case 'booking' : 
		include_once("booking.php");
	    break; 

	default : ?>
        <div class="message">
            <h1>WELCOME TO <span>OLLCF LMS</span></h1>
            <p>Explore and Borrow Books <br> Through Online</p>
            <button onclick="btnToggleRegisterForm()">SIGN UP NOW</button>
        </div> <?php 
		include_once("pg/login.php");
		include_once("pg/register.php");
	}
?>
