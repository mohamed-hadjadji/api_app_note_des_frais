<?php
require APPPATH .'/libraries/JWT.php';

class ImplementJwt
{
	/////la fonction générer le token/////
	PRIVATE $key = "subcribe_my_channel";
	public function GenerateToken($data)
	{
		$jwt = JWT::encode($data, $this->key);
		return $jwt;
	}

	/////fonction décode le token/////
	public function DecodeToken($token)
	{
		$decoded = JWT::decode($token, $this->key, array('HS256'));
		$decodedData = (array) $decoded;
		return $decodedData;
	}
}

?>