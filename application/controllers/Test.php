<?php
require APPPATH . '/libraries/ImplementJwt.php';

class Test extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->objOfJwt = new ImplementJwt();
		header('content-Type: application/json');
	}
	//////générer token et mettre donnés user dans le token///////

	public function loginToken()
	{
		$tokenData['uniqueId'] = '55555';
		$tokenData['role'] = 'admin';
		$tokenData['timeStamp'] = Date('Y-m-d h:i:s');
		$jwtToken = $this->objOfJwt->GenerateToken($tokenData);
	}
}
?>