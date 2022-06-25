<?php 
namespace App\Models;

class Users {
  
    protected $table = "users";
    protected $primaryKey = "entry";
    protected $useAutoIncrement = true;
    protected $returnType = "array";

    public function insert($data)
    {
        $db = \Config\Database::connect();
        $result = ['affectedRows' => 0, 'errors' => []];
        $relationData = [
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone']
        ];
        
        
        $db->table($this->table)->insert($relationData);
        
        $result['affectedRows'] = $db->affectedRows();
        if (!$result['affectedRows']) $result['errors'][] = $db->error();

        return $result;
    }
}