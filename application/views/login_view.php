<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une note</title>
</head>
<body>
	<h1>Ajouter une note</h1>

	<form method="post" name="" action="<?php echo base_url().'index.php/user/login';?>">

		<div>
			<label>Login</label>
			<input type="text" name="login">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password">
			
		</div>
		<div>
			<button>Valider</button>
			<a href="<?php echo base_url().'index.php/user/login'?>">Annuler</a>
		</div>
		
    </form>
</body>
</html>