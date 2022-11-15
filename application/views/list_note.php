<!DOCTYPE html>
<html>
<head>
	<title>Liste des Notes</title>
</head>
<body>
	<h1>Mes notes des frais</h1>
	<a href="<?php echo base_url().'index.php/note/create_note';?>">+Ajouter une note</a>
    <a href="<?php echo base_url().'index.php/user/disconnect/'?>" class="btn btn-primary">Disconnect</a>
	<hr>
    <table>
    	<tr>
    		<th>N°</th>
    		<th>Montant</th>
    		<th>image</th>
    		<th>Commentaire</th>
    		<th>ID</th>
    		<th>Statut</th>
    		<th>Date</th>
    		<th>Edit</th>
    		<th>Delete</th>
    	</tr>

    	<?php 
    	
       //var_dump($notes);
    	if (!empty($notes)) { foreach($notes as $note) {?>
         
    		<tr>
    			<td><?php echo $note['id']?></td>
    			<td><?php echo $note['price']?></td>
    			<td><?php echo '<img height="100" src="'.base_url().'files/'.$note['photo'].'">'?></td>
    			<td><?php echo $note['comment']?></td>
    			<td><?php echo $note['id_user']?></td>
    			<td><?php echo $note['state']?></td>
    			<td><?php echo $note['date']?></td>
    			<td>
    				<a href="<?php echo base_url().'index.php/note/edit_note/'.$note['id']?>">Edit</a>
    			</td>
    			<td>
    				<a href="<?php echo base_url().'index.php/note/delete_note/'.$note['id']?>">Delete</a>
    			</td>
    		</tr>

    	<?php } } else {?>
    		<tr>
    			<td>Note Found</td>
    		</tr>

    	<?php }?>
    </table>

   
</body>
</html>