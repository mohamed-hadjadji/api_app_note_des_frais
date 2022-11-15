<!DOCTYPE html>
<html>
<head>
	<title>Connect user</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
<header>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Expense-Report Application</a>
		</div>
	</div>
</header>
<main>
	
	<div class="container"><br>
		<h1>Connexion</h1>
		<form method="post" name="createUser" action="<?php echo base_url().'index.php/user/connect'?>">
		<div class="row">
			<div class="col_md-12">
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email"/><br>
					<?php echo form_error('email');?>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password"/><br>
					<?php echo form_error('password');?>
				</div>
                <div class="form-group">
					<button class="btn btn-dark">Connexion</button>
					<a href="<?php echo base_url().'index.php/user/connect'?>" class="btn btn-secondary">Annuler</a>
				</div>
			</div>			 
		</div>
	</form>
	</div>
</main>

</body>
</html>