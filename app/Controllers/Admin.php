<?php

/**
 * @property IncomingRequest $request 
 */
//use App\Controllers\BaseController;

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function login()
    {
         // Move this line outside of the if block

        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost(['email', 'password']);
            $admin_model = new \App\Models\AdminModel();
            $admin = $admin_model->where('email', $post['email'])
            ->where('password', sha1($post['password']))
            ->first();
            $session = session();

            if (!$admin) {
                $session->setFlashdata('invalid', 'Invalid username or password'); // Changed setflashdata to setFlashdata
            } else {
                $this->setAdminSession($admin);
                return redirect()->to('item/index');
            }
        }

        return view('admin/login');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('admin/login');
    }


    public function setAdminSession($admin)
    {
        $data = [
            'id' => $admin->id,
            'name'=> $admin->name,
            'email' => $admin->email,
            'isAdminLoggedIn' =>true,
        ];
        session()->set($data);
    }
}
