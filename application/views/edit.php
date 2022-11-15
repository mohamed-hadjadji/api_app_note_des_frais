
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
		<h1>Modification du profil</h1>
		<form method="post" name="createUser" action ="<?php echo base_url().'index.php/user/edit/'.$users['id'];?>">
		<div class="row">
			<div class="col_md-12">
				<div class="form-group">
					<label>Lastname</label>
					<input class="form-control" type="text" name="lastname" value="<?php echo set_value('lastname',$users['lastname']);?>">
				</div>
				<div class="form-group">
					<label>Firstname</label>
					<input class="form-control" type="text" name="firstname" value="<?php echo set_value('firstname',$users['firstname']);?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="text" name="password" value="">
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="text" name="email" value="<?php echo set_value('email',$users['email']);?>">
		
				</div>
				<div class="form-group">
					<label>Postes</label>
					<input class="form-control" type="text" name="selectrank" value="<?php echo set_value('selectrank',$users['rank']);?>">
		
				</div>
				
                <div class="form-group">
					<button class="btn btn-dark">Modifier</button>
					<a href="<?php echo base_url().'index.php/user/index'?>" class="btn btn-secondary">Annuler</a>
				</div>
			</div>			 
		</div>
	</form>
	</div>
</main>

</body>
</html>