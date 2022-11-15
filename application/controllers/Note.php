<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/CreatorJwt.php';
class Note extends CI_controller{

	public function __construct()
        {
            parent::__construct();
            $this->objOfJwt = new CreatorJwt();
			header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept,Access-Control-Request-Method,Authorization,Cache-Control");
       }

	function index_note($userId){
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
		$this->load->model('Note_model');
		
		$notes = $this->Note_model->all_note($userId);
        $data = array();
		$data['notes'] = $notes;
		echo json_encode($notes);		
		
	}
		function getIdNote($noteId)
	{
		$this->load->model('Note_model');	
    	$notes = $this->Note_model->getNote($noteId);
    	$data=array();
    	$data['expense_reports'] = $notes;
		echo json_encode($notes);
	}

	function create_note(){
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
       
       $this->load->model('Note_model');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Type','Type','required');
		$this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules('comment','Comment','required');
		$this->form_validation->set_rules('date','Date','required');			
		//configuration des données d'images
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'jpg|png|pdf';
		$config['max_size'] = 20000;
		$config['max_width'] = 15000;
		$config['max_height'] = 15000;
			//si le formulaire est mal rempli
			if ($this->form_validation->run() == false) 
			{	
				echo 'erreur';	
			}
			// sinon si le formulaire est bien rempli
			else
			{
				//mise en forme des donnée dans un tableau $formArray
				$formArray = array();
				$formArray['Type'] = $this->input->post('Type');
				$formArray['price'] = $this->input->post('price');
				//$formArray['photo'] = $this->input->post('photo');
				$formArray['photo'] = 'https://mohamed-hadjadji.students-laplateforme.io/apinote/files/'.$_FILES['photo']['name'];
				$formArray['comment'] = $this->input->post('comment');
				$formArray['id_user'] = $this->input->post('id_user');
				$formArray['date'] = $this->input->post('date');
				
				$this->Note_model->create_note($formArray);//insesrt donnée dans model olive	
				$this->load->library('upload', $config);//recuperation de la library upload (et prételechargement ?)
					//si la photo a bien était pré charger
					var_dump($_FILES['photo']);
					if ($this->upload->do_upload('photo')) 
					{
						$data = array('image_metadata' => $this->upload->data()); //telechargement ??
					}
					else
					{
						echo "erreur upload";
				    }
	        }
	}
	
	function edit_note($noteId)
	{
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}

		$this->load->model('Note_model');
		$this->load->library('form_validation');
		
        $this->form_validation->set_rules('Type','Type','required');
        $this->form_validation->set_rules('price','Price','required');
		$this->form_validation->set_rules(['photo','Photo','required']);
		$this->form_validation->set_rules('comment','Comment','required');		
		$this->form_validation->set_rules('date','Date','required');
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'pdf|jpg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 15000;
		$config['max_height'] = 15000;
        
        if ($this->form_validation->run() == false) {
			return 'erreur';
		    
	    } else{
	
	    	$formArray = array();
			$formArray['Type'] = $this->input->post('Type');
			$formArray['price'] = $this->input->post('price');
			//$formArray['photo'] = $this->input->post('photo');
			$formArray['photo'] = 'https://mohamed-hadjadji.students-laplateforme.io/apinote/files/'.$_FILES['photo']['name'];
			//$formArray['photo'] = $this->input->$patho = $_FILES['photo']['name'];
			$formArray['comment'] = $this->input->post('comment');
			$formArray['date'] = $this->input->post('date');
		    $this->Note_model->updateNote($noteId,$formArray);
			$data = array();
		    $data['expense_reports'] = $note;
            $this->load->library('upload', $config);
            	if ($this->upload->do_upload('photo')) 
					{
							$data = array('image_metadata' => $this->upload->data()); //telechargement ??
			
					}
					else
					{
					 echo "erreur";
					
					}
		    
	    }
	}

	function delete_note($noteId)
	{
        $this->load->model('note_model');
        $note = $this->note_model->getNote($noteId);
        if(empty($note)){
        	return 'failure Note found in Database!';
			
        }
        $this->note_model->deleteNote($noteId);
     
	}
	function editRH_note($noteId)
	{
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}

		$this->load->model('Note_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('selectstatut','Statut','required');		
        if ($this->form_validation->run() == false) {
			echo 'Pas bon';
		   
	    } else{
			echo 'bon';
	    	$formArray = array();
			$formArray['state'] = $this->input->post('selectstatut');
		    $this->Note_model->updatestatutNote($noteId,$formArray);
		    $data = array();
		    $data['expense_reports'] = $note;
			

		    
			
	    }
	}
}

?>