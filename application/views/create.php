<!DOCTYPE html>
<html>
<head>
	<title>Création user</title>
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
		<h1>Création du profil</h1>
		<form method="post" name="createUser">
		<div class="row">
			<div class="col_md-12">
				<div class="form-group">
					<label>Lastname</label>
					<input class="form-control" type="text" name="lastname"/><br>
					<?php echo form_error('lastname');?>
				</div>
				<div class="form-group">
					<label>Firstname</label>
					<input class="form-control" type="text" name="firstname"/><br>
					<?php echo form_error('firstname');?>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password"/><br>
					<?php echo form_error('password');?>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email"/><br>
		
				</div>
				<div class="form-group">
             		<label>Postes</label><br><br>
					<select name="selectrank">
				    <option value="">--Choisir--</option>
				    <option value="Salarié">Salarié</option>
				    <option value="RH">RH</option>
					</select><br><br><br>
  				</div>
                <div class="form-group">
					<button class="btn btn-dark">Création</button>
					<a href="<?php echo base_url().'index.php/user/index'?>" class="btn btn-secondary">Annuler</a>
				</div>
			</div>			 
		</div>
	</form>
	</div>
</main>

</body>
</html>