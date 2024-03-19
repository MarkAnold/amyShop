<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Auth\LoginModel;
use App\Models\Auth\UserProvider;

class LoginController extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    /**
     * Return The Logun form
     */
    public function index()
    {
    }

    /**
     * Login user
     */
    public function loginAction()
    {
        $request = $this->request;
        if (!$request->is('POST')) {
            echo 'Method not Allowed';
            exit;
        }
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            print_r($this->validator->getErrors());
        }

        $email = $request->getVar('email');
        $password = $request->getVar('password');
        // echo $password; exit;
        // check for user exitance
        $checkEmail =  $this->loginModel->where([
            'secret_one' => $email,
        ])->first();
        if ($checkEmail) {
            if (!password_verify($password, $checkEmail['secret_two'])) {
                return 'Wrong password';
            }
            if ($checkEmail['user_id']) {
                session()->set('user_id', $checkEmail['user_id']);
                $role =  $this->userRole($checkEmail['user_id']);
                // if($role['Rolename'] == "SuperAdmin"){
                // }

                switch ($role['Rolename']) {
                    case 'SuperAdmin':
                        # code...
                        $url = 'admin';
                        break;
                    case 'Admin':
                        # code...
                        $url = 'admin';
                        break;
                    case 'recieption':
                        # code...
                        $url = '/';
                        break;

                    default:
                        # code... 
                        $this->logoutAction();
                        break;
                }

                return redirect()->route($url);
            }
        }
    }

    /**
     * destory all user sessions and update logout time
     */
    public function logoutAction()
    {
        
    }

    public function dispalyError($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function userRole($id)
    {
        $model = new UserProvider();
        $data = $model->select('r.name as Rolename')
            ->join('roles as r', 'r.role_id = users.role_id')->find($id);
        return $data;
    }
}
