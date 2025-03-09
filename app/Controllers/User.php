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

        if ($username == NULL || $password == NULL){
            $errors = array();

            if ($username == NULL){
                $errors['username'] = "Must provide a username.";
            } else {
                $errors['password'] = "Must provide a password.";
            }
            return view('log_in', $errors);
        }

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);
            return view('success', ['username' => $user['username']]);
        } else {
            $errors = array();

            if (!$user) {
                $errors['username'] = 'User does not exist.';
            } else {
                $errors['password'] = "Password is incorrect.";
            }
            return view('log_in', $errors);
        }
    }

    public function signup()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($data['username'] == NULL || $data['password'] == NULL){
            $errors = array();

            if ($data['username'] == NULL){
                $errors['username'] = "Must provide a username.";
            } else {
                $errors['password'] = "Must provide a password.";
            }
            return view('signup', $errors);
        }

        $db = db_connect();

        $user = $userModel->where('username', $data['username'])->first();

        if ($user != NULL) {
            $errors = array();

            $errors['username'] = "Username already exists.";

            return view('signup', $errors);
        }

        $userModel->save($data);

        return view('log_in');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return view('entry');
    }

    public function dashboard()
    {
        $session = session();

        if (!$session->logged_in){
            return view('entry');
        }

        return view('success', ['username' => $session->username]);
    }
}
