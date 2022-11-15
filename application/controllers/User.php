<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/CreatorJwt.php';
class User extends CI_controller
{
	public function __construct()
        {
            parent::__construct();
            $this->objOfJwt = new CreatorJwt();
			header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept,Access-Control-Request-Method,Authorization,Cache-Control");
       }


    function index(){
		

    	$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}

    	$this->load->model('User_model');
    	$users = $this->User_model->all();   
    	$data=array();
    	$data['users'] = $users;
    	echo json_encode($users);
   		
    }
	function getId($userId)
	{
		$this->load->model('User_model');	
    	$user = $this->User_model->getUser($userId);
    	$data=array();
    	$data['users'] = $user;
		echo json_encode($user);
	}
    
    
	function create() {
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
		
		$this->load->model('User_model');
		$this->form_validation->set_rules('lastname','Lastname','required');
		$this->form_validation->set_rules('firstname','Firstname','required');
		$this->form_validation ->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('selectrank','Postes','required');


		if ($this->form_validation->run() == false) {
		
			echo validation_errors();
			return 'Erreur';
		
		} else {
			
			$formArray = array();
			$formArray['lastname'] = $this->input->post('lastname');
			$formArray['firstname'] = $this->input->post('firstname');
			$formArray['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));
			$formArray['email'] = $this->input->post('email');
			$formArray['rank'] = $this->input->post('selectrank');
			$this->User_model->create($formArray);

			
		}
	}
	
	function edit($userId)
    {
    	$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
    	$this->load->model('User_model');
	
		
    	
    	$this->form_validation->set_rules('lastname','Lastname','required');
		$this->form_validation->set_rules('firstname','Firstname','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('selectrank','Postes','required');
		if ($this->form_validation->run() == false) {
		} else {
			$formArray = array();
			$formArray['lastname'] = $this->input->post('lastname');
			$formArray['firstname'] = $this->input->post('firstname');
			$formArray['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));
			$formArray['email'] = $this->input->post('email');
			$formArray['rank'] = $this->input->post('selectrank');
			
			$user=$this->User_model->updateUser($userId,$formArray);
		    $data=array();
    	    $data['users'] = $user;
		    echo json_encode($user);
		
			
		}
			

    }

	
	    function delete($userId){
		$token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
		$this->load->model('User_model');
		$user=$this->User_model->getUser($userId);
		if (empty($user)) {
			return 'failure Profil Non Trouvé!';
			
		}
		$this->User_model->deleteUser($userId);

	}

function connect() 
    {

		    $inputs = $this->input->raw_input_stream;
		    $inputs = json_decode($inputs, true);
			$email = $inputs["email"];
			$password = $inputs["password"];
			$user = $this->db->get_where('users',['email' => $email])->row();
			
			if(!$user) {
				$response = "Email ou mot de passe incorrect";
				$this->output
						->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
				exit;
			}

			if(!password_verify($password,$user->password)) {
				$response = "Email ou mot de passe incorrect";
				$this->output
						->set_status_header(401)
						->set_content_type('application/json', 'utf-8')
						->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
						->_display();
				exit;
			}
                $tokenData['email'] = $user->email;
				$tokenData['rank'] = $user->rank;
                $tokenData['id'] = $user->id;

		
			  $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
             
		    echo $jwtToken;
			
			
		
    	
  }

  function disconnect(){
  	$this->load->model('User_model');
    $users = $this->User_model->logout();
   
  }

  function noteUser($userId){
  	    $token =$this->input->get_request_header('Token');
		if ($this->objOfJwt->verifyToken($token) === false) {
			return;
		}
  		$this->load->model('User_model');
		$notes=$this->User_model->note_user($userId);
		$data=array();
    	$data['notes'] = $notes;
    	echo json_encode($notes);
        
  }


}

?>