<?php namespace App\Http\Requests\Inside;

use App\Http\Requests\Request;

class UserRequests extends Request
{

    public function __construct()
    {
    }
    public function authorize() {
        return true;
    }
    public function rules() {
        $data = array();
        $data["username"] = 'required';
        $data["password"] = 'required';
        return $data;
    }

    public function messages () {
        $data = array();
        $data["username.required"] = 'Vui lòng nhập user name';
        $data["password.required"] = 'Vui lòng nhập mật khẩu';
        return $data;
    }
}