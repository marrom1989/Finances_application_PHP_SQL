<?php

	
	session_start();
	
		if(!isset($_SESSION['online'])) {
		
		header('Location: index.php');
		exit();
	}

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
	<link rel ="stylesheet" href = "css/add_expense_style.css" type = "text/css" />
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
					<div class="col" id="clock"><?php date_default_timezone_set('Europe/Warsaw'); echo $clock = date('Y/m/d H:i:s'); ?></div>
			</div>		
		</div>
	</header>
	<nav class="navbar navbar-expand-xl navbar-light bg-light" id="navSpec">
		<a class="navbar-brand" href="#">Menu:</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>	
			<div class="collapse navbar-collapse" id="navbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item" id="income">
						<a href="add_incomes.php" class="nav-link">Add Income</a>
					</li>
					<li class="nav-item" id="expense">
						<a href="add_expense.php" class="nav-link">Add Expense</a>
					</li>
					<li class="nav-item" id="balance">
						<a href="balance.php" class="nav-link">Balance</a>
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
			<form action="php_add_expense.php" method="post">
				<div class="container border" id="mainContent">
					<div class="form-group row justify-content-center">
						<div class = "col-12 col-sm-8 col-md-6">
								<input type = "text" class="form-control" id="amount" placeholder = "Amount" name="amount">
						</div>
					</div>	
					<div class="form-group row justify-content-center">
						<div class = "col-12 col-sm-8 col-md-6">
								<input type = "date" class="form-control" id="date" placeholder = "Date" name="date" value="<?php $date = new DateTime(); echo $date->format('Y-m-d');  ?>">
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<div class = "col-12 col-sm-8 col-md-6">
								<input type = "text" class="form-control" id="paymentMethod" placeholder = "Cash / Debit_Card / Credit_card" name="paymentMethod">
						</div>
					</div>
					<div class="form-group row justify-content-center">	
						<div class = "col-12 col-sm-8" id="radioContent">
							<div class="row justify-content-center">
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad0" name ="choice" value = "Food">Food</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad1" name ="choice" value = "House">House</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad2" name ="choice" value = "Transport">Transport</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad3" name ="choice" value = "Telecomunication">Telecomunication</label>
									</div>
								</div>
								<div class ="row  justify-content-center">
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad4" name ="choice" value = "Healthcare">Healthcare</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad5" name ="choice" value = "Cloth">Cloth</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad6" name ="choice" value = "Hygiene">Hygiene</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad7" name ="choice" value = "Kids">Kids</label>
									</div>
								</div>
								<div class ="row  justify-content-center">
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad8" name ="choice" value = "Entertainment">Entertainment</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad9" name ="choice" value = "Trip">Trip</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad10" name ="choice" value = "Trainings">Trainings</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad11" name ="choice" value = "Books">Books</label>
									</div>
								</div>
								<div class ="row  justify-content-center">		
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad12" name ="choice" value = "Savings">Savings</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad13" name ="choice" value = "Pension">Pension</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad14" name ="choice" value = "Repayment">Repaymen</label>
									</div>
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad15" name ="choice" value = "Donation">Donation</label>
									</div>
								</div>
								<div class ="row  justify-content-center">
									<div class ="col-sm-6 col-md-3">
										<label><input type ="radio" id ="rad16" name ="choice" value = "Others">Others:</label>
									</div>
									<div class=" col-sm-6 col-md-3">
											<input type ="text"class="form-control" id="comm" placeholder = "Comment" value = "Comment" name="comment"> 
									</div>
								</div>
						</div>	
					</div>
					<div class="row justify-content-center">
						<div class="col-4 col-sm-3 col-md-2">
								<button type="submit" class="btn-lg btn-danger" id="button">Add Expense </button>
						</div>
					</div>			
				</div>	
			</form>
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
<script type ="text/javascript" src = "js/hideAndShowElements.js"></script>
<script type ="text/javascript" src = "js/clock.js"></script>
</body>

</html>