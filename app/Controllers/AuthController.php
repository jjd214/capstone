<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login',
            'validation' => null
        ];
        return view('admin/pages/auth/login', $data);
    }

    public function loginHandler() {
        $fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email') {
            $isValid = $this->validate([
                'login_id' => [
                    'rules' => 'required|valid_email|is_not_unique[users.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Invalid Email',
                        'is_not_unique' => 'Incorrect email or password!'
                    ]
                ],
                
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 8 characters',
                        'max_length' => 'Password is too long'
                    ]
                ]
            ]);
        } else {
            $isValid = $this->validate([
                'login_id' => [
                    'rules' => 'required|is_not_unique[users.username]',
                    'errors' => [
                        'required' => 'Username is required',
                        'is_not_unique' => 'Incorrect email or password!'
                    ]
                ],
                
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 8 characters',
                        'max_length' => 'Password is too long'
                    ]
                ]
            ]);
        }
        if( !$isValid ) {
            return view('admin/pages/auth/login', ['pageTitle' => 'login', 'validation' => $this->validator]);
        } else {
            echo "Form Validated";
        }
    }

}
