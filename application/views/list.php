<!DOCTYPE html>
<html>
<head>
	<title>List Users</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
	<header>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="#" class="navbar-brand">Expense-Report Application</a>
         <a href="<?php echo base_url().'index.php/user/disconnect/'?>" class="btn btn-primary">Disconnect</a>
		</div>
	</div>
	</header>
	<main>
	<br>
   <div class="container d-flex flex-row">
   	<div class="col-6"><h3>Liste des Utilisateurs</h3></div>
   	<div>
   	<a href="<?php echo base_url().'index.php/user/create/'?>" class="btn btn-primary">Créer</a>
   </div>
   </div>
   <br>
   <div class="row">
   	<div class="col-md-12">
   		<table class="table table-dark table-striped">
   			<tr>
   				<th>ID</th>
   				<th>Lastname</th>
   				<th>Firstname</th>
   				<th>Password</th>
   				<th>Email</th>
   				<th>Postes</th>
   				<th>Edit</th>
   				<th>Delete</th>
               <th>Note de frais</th>
   			</tr>

   			<?php
             if (!empty($users)) { foreach ($users as $user) {?>


   				<tr>
   				<td><?php echo $user['id']?></td>
   				<td><?php echo $user['lastname']?></td>
   				<td><?php echo $user['firstname']?></td>
   				<td><?php echo $user['password']?></td>
   				<td><?php echo $user['email']?></td>
   				<td><?php echo $user['rank']?></td>
   				<td><a href="<?php echo base_url().'index.php/user/edit/'.$user['id']?>" class="btn btn-primary">Modifier</a></td>
   				<td><a href="<?php echo base_url().'index.php/user/delete/'.$user['id']?>" class="btn btn-danger">Effacer</a></td>
               <td><a href="<?php echo base_url().'index.php/user/noteUser/'.$user['id']?>" class="btn btn-primary">Note de frais</a></td>
   			</tr>
   			<?php } } else { ?>
   				<tr>
   					<td colspan="5">Aucun Enregistrement trouvé</td>
   				</tr>
   			<?php } ?>
   			
   			
   		</table>
   	</div>
   </div>
   </main>
</body>
</html>