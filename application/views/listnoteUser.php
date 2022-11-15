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
         <a href="<?php echo base_url().'index.php/user/index/'?>" class="btn btn-primary">Accueil</a>
		</div>
	</div>
	</header>
	<main>
	<br>
   <div class="container d-flex flex-row">
   	<div class="col-6"><h3>Liste des Notes de frais</h3></div>
   	<div>
   	
   </div>
   </div>
   <br>
   <div class="row">
   	<div class="col-md-12">
   		<table class="table table-dark table-striped">
   			<tr>
   			
   				<th>Prix</th>
   				<th>Image</th>
   				<th>Comment</th>
   				<th>statut</th>
   				<th>Date</th>
               <th>Statut</th>
   			</tr>

   			<?php
             if (!empty($notes)) { foreach ($notes as $note) {?>

   				<tr>		
   				<td><?php echo $note['price']?></td>
   				<td><?php echo '<img height="100" src="'.base_url().'files/'.$note['photo'].'">'?></td>
   				<td><?php echo $note['comment']?></td>
   				<td><?php echo $note['state']?></td>
   				<td><?php echo $note['date']?></td>
   				<td><a href="<?php echo base_url().'index.php/note/editRH_note/'.$note['id']?>" class="btn btn-primary">Modifier Statut</a></td>
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