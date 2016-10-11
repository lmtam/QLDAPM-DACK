<?php namespace App\Http\Models\Outside;

use App\Http\Requests\Request;
use App\MyCore\Inside\Models\DbTable;
use App\Http\Requests\Outside\UserRequests;
use Illuminate\Auth\Authenticatable;
use DB;

class UserModels extends DbTable{
    public $primaryKey = 'user_name';

    public function __construct(array $options = array())
    {
        parent::__construct($options);
        $this->table = 'users';

        $this->params = \Request::all();

    }

    public function getUserByUserName($userName){
        return UserModels::where('user_name',$userName);
    }


}
