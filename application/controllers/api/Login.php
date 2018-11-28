<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Login extends REST_Controller {

    public function login_post() {
        if ($this->ion_auth->login($this->input->post('username'), 
                $this->input->post('password'))) {
            $user = $this->ion_auth->user()->row();
            //sample random token
            $token = md5(rand(0, 100000));
            $this->ion_auth->update($user->id, ['token' => $token]);
            $data = [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'token' => $token
            ];
            $this->response($data);
        } else {
            $error_messages = $this->ion_auth->errors();
            $this->response($error_messages, REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function logout_post() {
        $this->ion_auth->logout();
        $this->response('logout');
    }

}