<!DOCTYPE html>
<html>
<head>
	<title>Modifier une note</title>
</head>
<body>
	<h1>Modifier une note</h1>

	<form method="post" name="createNote" enctype="multipart/form-data" action="<?php echo base_url().'index.php/note/edit_note/'.$note['id'];?>">

		<div>
			<label>Prix</label>
			<input type="text" name="prix" value="<?php echo set_value('prix',$note['price'])?>">
			<?php //echo form_error('prix');?>
		</div>
		
		<div>
			<label>Commentaire</label>
			<input type="text" name="commentaire" value="<?php echo set_value('commentaire',$note['comment'])?>">
			<?php //echo form_error('commentaire');?>
		</div>
		<div>
			<label>Photo</label>
			<input type="file" name="photo" id="pic_file" value="<?php echo set_value('photo',$note['photo'])?>">
			<?php echo form_error('photo');?>
		</div>
		
		<div>
			<label>Date</label>
			<input type="date" name="date" value="<?php echo set_value('date',$note['date'])?>">
		</div>
		<div>
			<button>Modifier</button>
			<a href="<?php echo base_url().'index.php/note/index_note'?>">Annuler</a>
		</div>
    </form>
</body>
</html>