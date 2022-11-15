<?php
class User_model extends CI_model {

	function create($formArray)
	{
       $this->db->insert('users',$formArray);//insertion User bdd
	}

	        
    function connect() 
    {
		$user = $this->db->get_where('users',['email' => $email])->row();
		$id=$this->db->where('id');//connection User
		return $user;
		
	}

	function logout() 
	{
		
		$this->session->sess_destroy();//deconnection Users
	
	}
        
    
	function all ()
	{
     return $users = $this->db->get('users')->result_array();//select tous les Users
    
	}

	function getUser($userId){
		$id=$this->db->where('id',$userId);
		
		return $user = $this->db->get('users')->row_array();//select 1 Users

	}

	function updateUser($userId,$formArray) {
		$this->db->where('id',$userId);
		$this->db->update('users',$formArray);//update Users where id =
	}

	function deleteUser($userId) {
		$this->db->where('id',$userId);
		$this->db->delete('users');//delete Users where id =
	}

		function note_user($userId){

		$this->db->select('*');
        $this->db->from('users');
        $this->db->join('expense_reports', 'expense_reports.id_user = users.id', 'inner');
        $this->db->where('users.id',$userId);

        return $notes = $this->db->get()->result_array();
	}

}
?>