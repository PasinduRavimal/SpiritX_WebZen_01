<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function signupGet(): string
    {
        return view('signup');
    }

    public function loginGet(): string
    {
        return view('log_in');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);
            return view('success');
        } else {
            $session->setFlashdata('error', 'Invalid username or password');
            return view('log_in');
        }
    }

    public function signup()
    {
        $session = session();
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($data['username'] == NULL || $data['password'] == NULL){
            $session->setFlashData('error', 'Please provide all the values.');
            return view('signup');
        }

        $db = db_connect();

        $user = $userModel->where('username', $data['username'])->first();

        if ($user != NULL) {
            $session->setFlashData('error', 'User already exists!');
            return view('signup');
        }

        $userModel->save($data);

        $session->setFlashData('error', 'Signup Complete! Please login.');
        return view('log_in');
    }
}
