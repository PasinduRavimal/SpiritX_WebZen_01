<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        return view('log_in');
    }

    public function login()
    {
        if ($this->request->getPost('submit') !== NULL){

            $Username = $this->request->getPost('username');
            $Password = $this->request->getPost('password');

            $db = db_connect();
    
            $db->query("SELECT * FROM users WHERE username='$Username'");
    
            $result_log = mysqli_query($conn, $query);
    
            while ($record = mysqli_fetch_assoc($result_log)){
                if($record['password'] == $Password){
    
                    $_SESSION['username'] = $record['username'];
                    $_SESSION['email'] = $record['email'];
    
                    if($record['role'] == 'admin'){
                        header("Location: ../admin/admin.php");
                        exit;
                    }else{
                        header("Location: ../home.php");
                        exit;
                    }
                }
            }
    
            echo "<script>alert('Login failed!');</script>";        
        }
    }
}
