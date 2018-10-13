<?php
	
	session_start();
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>House budget</title>
	<meta name = "discription" content = "Take care of your home budget. This application helps you to hold your hand on your moneys!!" />
	<meta name = "keywords" content = "budget, money, deposit, whithdraw, house budget, " />
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel ="stylesheet" href = "cssFontello/fontello.css" type = "text/css" />
	<link rel ="stylesheet" href = "css/login_style.css" type = "text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin-ext" rel="stylesheet">
	
	<script  src = "clock.js"></script>
</head>
<body>
		<header>
		<div class="container-fluid border-bottom" id="header">
			<div class="row justify-content-around">
					<div class="col" id="logo">
						<a href ="index.php" id="logoLink">House<i class = "icon-money"></i><span style="color: #CC0000">Budget </span></a>
					</div>
					<div class="col" id="clock"></div>
			</div>		
		</div>
	</header>
	<nav class="navbar navbar-expand-md navbar-light bg-light" id="navSpec">
		<a class="navbar-brand" href="#">Menu:</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>	
			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item" id="income">
						<a href="#" class="nav-link">Add Income</a>
					</li>
					<li class="nav-item" id="expense">
						<a href="#" class="nav-link">Add Expense</a>
					</li>
					<li class="nav-item" id="balance">
						<a href="#" class="nav-link">Balance</a>
					</li>
					<li class="nav-item" id="settings">
						<a href="#" class="nav-link">Settings</a>
					</li>
					<li class="nav-item">
						<a href="php_logout.php" class="nav-link">Log Out</a>
					</li>	
				</ul>
			</div>
	</nav>
			<main>
				<article>
					<div class="container border" id="mainContent">
						<div class = "row justify-content-around border-bottom" id="logInBackground">
								<div class="col-3 align-self-center">Log In</div> 
								<div class="col-3 align-self-center"><i class = "icon-login"></i></div>
						</div>
							<form action="php_login.php" method="post">
								<div class="form-group row justify-content-center" id="email">
									<div class ="col-12 col-sm-8 col-md-6">
										<input type = "email"  class="form-control" placeholder = "Email" name="email">
									</div>
								</div>
								<div class="form-group row justify-content-center" id="password">
									<div class="col-12 col-sm-8 col-md-6"> 
										<input type = "password" class="form-control" placeholder = "Password" name="password">
											<?php  if(isset($_SESSION['error_logIn'])) {
											
													echo '<div class="error">'.$_SESSION['error_logIn'].'</div>';
													unset($_SESSION['error_logIn']);
										}     ?>
									</div>
								</div>
								
							<div class="row justify-content-around">	
								<div class="col-4 col-sm-3 col-md-2">
									<button type="submit" class="btn-lg btn-danger" id="buttonSpec">Log In </button>
								</div>
							</div>
						</form>
					</div>
				</article>
			</main>
			
			<footer class= "footer">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12" id="footerCss">
							HouseBudget.com &copy; 2018
						</div>
					</div>	
				</div>	
			</footer>
			
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type ="text/javascript" src = "js/jquery-3.3.1.min.js"></script>
<script type ="text/javascript" src = "js/clock.js"></script>
<script type ="text/javascript" src = "js/hideAndShowElements.js"></script>
</body>

</html>