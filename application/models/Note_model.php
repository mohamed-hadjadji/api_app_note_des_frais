<?php
class Note_model extends CI_model {

	function create_note($formArray)
	{
		$this->db->insert('expense_reports', $formArray); // INSERT INTO expense_reports (prix, image,...) values (.....)
	}

	function all_note($userId)
	{   
		$this->db->order_by('id', 'DESC');
		$this->db->where('id_user', $userId);
		return $notes = $this->db->get('expense_reports')->result_array(); //SELECT * from expense_reports      
	}

	function getNote($noteId)
	{
		$this->db->where('id',$noteId);
		return $note =$this->db->get('expense_reports')->row_array(); // SELECT * from expense_reports where id = ?
	}

	function updateNote($noteId,$formArray)
	{
		$this->db->where('id',$noteId);
		$this->db->update('expense_reports',$formArray); //update expense_reports SET price = ?, image = ? ... where id = ?
	}

	function deleteNote($noteId)
	{
		$this->db->where('id',$noteId);
		$this->db->delete('expense_reports'); //DELETE FROM expense_reports where id = ?
	}

	function updatestatutNote($noteId,$formArray)
	{
		$this->db->where('id',$noteId);
		$this->db->update('expense_reports',$formArray); //update statut expense_reports SET price = ?, image = ? ... where id = ?
	}
	
}
?>