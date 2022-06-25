<?php

namespace App\Libraries;

use App\Models\Users as ModelsUsers;

class Users {
    private $response = [
        'status' => 1,
        'data' => [],
        'errors' => []
    ];
    public function createUser($data = [])
    {
        $user_model = new ModelsUsers();
        $response = ["status" => 1, 'data' => [], 'errors' => []];
        $user_data = [
            'username'=> $data['username'],
            'name'=>$data['name|required'],
            'email'=> $data['email|required'],
            'password'=>$data['password'],
            'phone' => $data['phone']
        ];
        
        $dbResponse = $user_model->insert($user_data);

        if (!$dbResponse['affectedRows']) {
            $this->response['status'] = 0;
            $this->response['errors'][] = $dbResponse['error'];
            return $this->$response;
        }

        $this->response['data'][] = [
            'name'=>$data['name|required'],
            'email'=> $data['email|required'],
        ];

        return $this->response;
    }
}