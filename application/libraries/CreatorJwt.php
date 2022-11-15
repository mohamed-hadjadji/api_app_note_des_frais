 <?php
 //application/libraries/CreatorJwt.php

    require APPPATH . '/libraries/JWT.php';

    class CreatorJwt
    {
        /*************This function generate token private key**************/ 

        PRIVATE $key = "1234567890qwertyuiopmnbvcxzasdfghjkl"; 
        public function GenerateToken($data)
        {          
            $jwt = JWT::encode($data, $this->key);
            return $jwt;           
        }
        

       /*************This function DecodeToken token **************/

        public function DecodeToken($token)
        {          
            $decoded = JWT::decode($token, $this->key, array('HS256'));
            $decodedData = (array) $decoded;
            return $decodedData;
        }



        public function verifyToken($token){
           
        if (!empty($token)) {
            $token =  substr($token, 7);
        }
        try{
            $key = "1234567890qwertyuiopmnbvcxzasdfghjkl";
            $decodedToken=JWT::decode($token,$key,array('HS256'));
        }catch(Exception $e){
            echo json_encode("Token invalide ou introuvable");
            return false;
        }
        }
    }