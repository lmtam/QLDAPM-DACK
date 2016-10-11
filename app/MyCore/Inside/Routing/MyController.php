<?php

namespace App\MyCore\Inside\Routing;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Inside\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;

class MyController extends Controller {

    public $data    = array();
    public $request = null;
    public $user    = null;
    public function __construct($options = array()) {
        
        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        
        list($controller, $action)    = explode('@', $controller);
        
        $this->data['moduleName']     = 'inside';

        $this->data['controllerNameDefault'] = $action;
        $this->data['actionNameDefault'] = $action;
//        if (!Auth::check()
//            && !in_array($action, array('getLogin', 'postLogin'))) {
//            header("Location: /{$this->data['moduleName']}/users/login");
//            exit();
//        }


        $this->user = Auth::user();
//        if (isset($this->user->is_admin) && !$this->user->is_admin
//            && !in_array($action, array('getLogin', 'postLogin'))) {
//            header("Location: /{$this->data['moduleName']}/users/login");
//            exit();
//        }
        $this->data['user'] = $this->user;
    }

    /**
     * push data xuống view
     *
     * @return mixed
     *
     */
    public function buildDataView($data = array()) {
        extract($data);
        
        return call_user_func_array('compact', array_keys($data));
    }
}
