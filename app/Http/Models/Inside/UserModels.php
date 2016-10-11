<?php namespace App\Http\Models\Inside;

use App\Http\Requests\Request;
use App\MyCore\Inside\Models\DbTable;
use App\Http\Requests\Inside\UsersRequests;

use DB;

class UserModels extends DbTable{
    public $primaryKey = 'user_name';

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->table = 'users';

        $this->params;
        $this->timestamps = false;
    }
    public static function getAllUser(){
        return self::get();
    }
    public function getUserByUserName($userName){
        return UserModels::where('user_name',$userName)->get()->first();
    }

    /**
     * @param $data is a array email and password
     * @author TamLe
     */
    public function login($data){

        $userbyid = $this->getUserByUserName($data['username']);

        if($userbyid == null){
            return false;
        }
        else{
          if($userbyid->isadmin == 1 && $userbyid->user_password == $data['password']){

              return true;
          }
          else{
              return false;
          }
        }
    }
    /**
     * @param $data is a array email and password
     * @author TamLe
     */
    public function signup($data){
        //so sanh nhắc lại mật khẩu và mật khẩu
        if(strcmp($data['password'],$data['confirmpassword'])== 0 )
        {
            $alluser = self::getAllUser();
//            echo "<pre>";
//            print_r($alluser);
//            die();
            foreach ($alluser as $item) {
                if(strcmp($item->user_name,$data['username'])== 0 ){
                    return false;
                }
            }

            $object = new UserModels();

            $object->user_name = $data['username'];
            $object->user_password = $data['password'];
            $object->created_day = date('Y-m-d');
            $object->isadmin = 1;
            if ($object->save()) {
                return true;
            } else {
                return false;
            }

        }
        else{
            return false;
        }



    }

}
