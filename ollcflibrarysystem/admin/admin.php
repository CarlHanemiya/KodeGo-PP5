<?php
include_once("navigator.php"); ?>
<div class="main-content">
	<?php 
	$display =  (isset($_GET['con']) && $_GET['con'] != '') ? $_GET['con'] : ''; ?>
	<div class="sub-content"> <?php
		switch ($display) {   
			case 'book' :
				include_once("pg/book.php");
				break;

			case 'addbook' :
				include_once("pg/addBook.php");
				break;

			case 'updatebook' :
				include_once("pg/addBook.php");
				break;
	
			case 'category' : 
				include_once("pg/category.php");
				break; 
			
			case 'updatecategory' :
				include_once("pg/addCategory.php");
				break;

			case 'addcategory' :
				include_once("pg/addCategory.php");
				break;

			case 'user' : 
				include_once("pg/user.php");
				break; 
			
			case 'borrow' :
				include_once("pg/borrow.php");
				break;
			
			case 'return' :
				include_once("pg/return.php");
				break;
			
			case 'request' :
				include_once("pg/request.php");
				break;
			
			case 'overdue' :
				include_once("pg/overdue.php");
				break;
				
			case 'report' :
				include_once("pg/report.php");
				break;
			
			case 'deleterecord' :
				include_once("./db/cruds/deleteRecord.php");
				break;
			
			case 'transaction' :
				include_once("./db/cruds/adminTransaction.php");
				break;
				
			default :
			include_once("pg/dashboard.php");
		}?>
	</div>
</div>
<script src="./js/dropdownFunctionality2.js"></script>