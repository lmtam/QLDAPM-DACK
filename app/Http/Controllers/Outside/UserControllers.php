<?php

namespace App\Http\Controllers\Outside;

use App\Http\Models\Outside\UserModels;
use App\MyCore\Outside\Routing\MyController;
use View;
use App\Http\Requests\Outside\UserRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use App\Http\Models\Inside\Users;

class UserControllers extends MyController{
    private $_model = null;
    private $_params = array();
    public function __construct() {
        $options = array();
        $this->_params = \Request::all();
        $this->data['params'] = $this->_params;
        parent::__construct($options);

        $this->data['title'] = 'User';
        $this->data['controllerName'] = 'users';

        $this->_model = new UserModels();
    }

    public function getLogin(){
        return view("{$this->data['moduleName']}/{$this->data['controllerName']}.login",$this->buildDataView($this->data));
    }
    public function postLogin(UserRequests $requests){
        $post = $requests->all();
        echo "<pre>";
        var_dump($post);
        die();
        $a = $this->_model->login($post);
//        echo $this->data['moduleName'].'/'. $this->data['controllerName'].'/dashboard';
//        die();
        if($a){
            return redirect("{$this->data['moduleName']}/{$this->data['controllerName']}/dashboard");
        }else{

        }
    }
}