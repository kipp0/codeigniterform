<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Libraries\Users;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;

class AjaxRequest extends BaseController {
  private $ReqData = [];
  private $ResData = [
    'status' => 1,
    'data' => [],
    'errors' => []
  ];
  private $strInputs = [
    'name|required',
    'pass|required',
    'phone',
  ];
  
  public function init()
  {
    // don't have the time to set csrf_token() up
    $this->validateUserRegistrationData($_POST);
    
    $username = join("_", preg_split("/[-\s]/", $this->ReqData['name|required']));
    $pass = $this->passwordGenerator();
    $this->ReqData['username'] = $username;
    $this->ReqData['password'] = $pass;
    $subject = "Account Created!";
	  $msg = "Hi $username, Your account has been created with the password: $pass";
    
    $this->createUser();
    mail($this->ResData['data'][0]['email'],$subject, $msg);
    
    return json_encode($this->ResData);
  }
  private function validateUserRegistrationData(array $data): void
  {
    
    foreach($data as $k => $v) {
      if ($this->varTypeCheck('string', $k)) {
        $v = (string) $v;
        $v = trim(esc($v));
      }
      $data[$k] = $v;
    }
    $this->ReqData = $data;
  }
  private function varTypeCheck(string $dataType, string $key): bool
  {
    if ($dataType == 'string') return array_key_exists($key, $this->strInputs);
  }
  private function passwordGenerator() 
  {
      $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $password = array(); 
      $alpha_length = strlen($alphabet) - 1; 
      for ($i = 0; $i < 8; $i++) 
      {
          $n = rand(0, $alpha_length);
          $password[] = $alphabet[$n];
      }
      return implode($password); 
  }
  private function createUser()
  {
    $user_lib = new Users();
    $this->ResData = $user_lib->createUser($this->ReqData);
  }
}