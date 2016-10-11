<?php

namespace App\Http\Controllers\Inside;

use App\Http\Models\Inside\UserModels;
use App\Http\Requests\Request;
use App\MyCore\Inside\Routing\MyController;
use View;
use App\Http\Requests\Inside\UserRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Hash;
use App\Http\Models\Inside\User;

class UserControllers extends MyController{
    use AuthenticatesAndRegistersUsers ;
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
    public function getIndex(){
        return view("{$this->data['moduleName']}/{$this->data['controllerName']}.index",$this->buildDataView($this->data));

    }


    public function getLogin(){

        return view("{$this->data['moduleName']}/{$this->data['controllerName']}.login", $this->buildDataView($this->data));
    }

    public function postLogin(UserRequests $requests){
        $post = $requests->all();

        if($this->_model->login($post)){
            return redirect(("{$this->data['moduleName']}/{$this->data['controllerName']}/index"));
        }else{
            return redirect(("{$this->data['moduleName']}/{$this->data['controllerName']}/login"));
        }
    }
    public function getSignup(){

        return view("{$this->data['moduleName']}/{$this->data['controllerName']}.signup",$this->buildDataView($this->data));
    }

    public function postSignup(UserRequests $requests){
        $post = $requests->all();

        if($this->_model->signup($post)){
            return redirect(("{$this->data['moduleName']}/{$this->data['controllerName']}/login"));
        }
        else{
            return redirect(("{$this->data['moduleName']}/{$this->data['controllerName']}/signup"));
        }
    }
}