<?php
sleep(0);
if (isset($_GET['con']) && ($_GET['con'] != 'return') && ($_GET['con'] != 'borrow') && ($_GET['con'] != 'request2')) {
	require_once("sidepanelleft.php");
	require_once("sidepanelright.php");
} else {
	sleep(1);
} ?>
<div class="user-main-content">
	<?php 
	$display =  (isset($_GET['con']) && $_GET['con'] != '') ? $_GET['con'] : ''; ?>
	<div class="user-sub-content"> <?php
		switch ($display) {
			case 'userborrowbook' :
				include_once("././db/cruds/userBorrowBook.php");
				break;
			
			case 'request2' :
				include_once("pg/request2.php");
				break;
			
			case 'searchbook' :
				include_once("pg/searchbook.php");
				break;

			case 'borrow' :
				include_once("pg/borrow.php");
				break;

			case 'bookinfo' :
				include_once("pg/bookinfo.php");
				break;
			
			case 'return' :
				include_once("pg/return.php");
				break;

			case 'books' :
				include_once("pg/books.php");
				break;

			case 'rules' :
				include_once("pg/rules.php");
				break;

			case 'transaction' :
				include_once("./db/cruds/userTransaction.php");
				break;

			default :
			include_once("pg/home.php");
		}?>
	</div>
</div>
<script src="./js/dropdownFunctionality2.js"></script>