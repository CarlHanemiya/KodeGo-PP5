<div id="nav-bar">
	<div id="logo">
		<img src="img/logo.jpg">
		<a href="index.php?con=home">OLLCF<p>Library Management System</p></a> 
	</div> <?php
	if(isset($_SESSION["logStatus"])) { ?>
		<ul id="nav-menu"> <?php
			if($_SESSION["accType"] == "User") { ?>	
				<li id="nav-item" onclick="window.location='index.php?con=home'">
					<a id="<?php if(isset($_GET['con']) && $_GET['con'] == 'home') { echo 'activeNav'; } ?>">Home</a>
				</li> 
				<li id="nav-item" onclick="window.location='index.php?con=books'">
					<a id="<?php if(isset($_GET['con']) && $_GET['con'] == 'books') { echo 'activeNav'; } ?>">Books</a>
				</li> 
				<li id="nav-item" onclick="window.location='index.php?con=rules'">
					<a id="<?php if(isset($_GET['con']) && $_GET['con'] == 'rules') { echo 'activeNav'; } ?>">Rules & Regulations</a>
				</li> <?php
			} ?>
		</ul>
		<div id="wrapper-nav">
			<i id="nav-greeting">Welcome, <?php echo $_SESSION["accType"] . ": "; ?></i> 
			<ul id="nav-acc">
				<li id="nav-acc-li" onclick="window.location='#'">
					<h3><?php echo strtoupper($_SESSION["accFullname"]); ?> <span>&#9660;</span></h3>
					<ul>
						<li onclick="btnToggleProfileForm()">
							<a>PROFILE</a>
						</li> <?php
						if ($_SESSION["accType"] == "User") { ?>
							<li onclick="window.location='index.php?con=request2'">
								<a>REQUEST</a>
							</li>
							<li onclick="window.location='index.php?con=borrow'">
								<a>BORROWED</a>
							</li>
							<li onclick="window.location='index.php?con=return'">
								<a>RETURNED</a>
							</li> <?php
						}
						if	($_SESSION["accType"] == "Admin") { ?>
							<li onclick="">
								<a>SETTING</a>
							</li> <?php
						} ?>
						<li onclick="window.location='db/logout.php'">
							<a>LOGOUT</a>
						</li>
					</ul>
				</li>
			</ul>	
		</div> <?php 
	} else { ?>
		<div class="btn-login">
			<img src="img/user.jpg">
			<button onclick="btnToggleLoginForm()">Login</button>
		</div> <?php
	} ?>
</div>
