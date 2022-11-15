<!DOCTYPE html>
<html>
<head>
	<title>Ajouter une note</title>
</head>
<body>
	<h1>Ajouter une note</h1>

	<form method="post" name="createNote" enctype="multipart/form-data" action="<?php echo base_url().'index.php/note/create_note';?>">

		<div>
			<label>Prix</label>
			<input type="text" name="prix">
			<?php echo form_error('prix');?>
		</div>
		<div>
			<label>Photo</label>
			<input type="file" name="photo" id="pic_file">
			<?php echo form_error('photo');?>
		</div>
		<div>
			<label>Commentaire</label>
			<input type="text" name="commentaire">
			<?php echo form_error('commentaire');?>
		</div>
		
		<div>
			<label>Date</label>
			<input type="date" name="date">
		</div>
		<div>
			<button>Valider</button>
			<a href="<?php echo base_url().'index.php/note/index_note'?>">Annuler</a>
		</div>
    </form>
</body>
</html>