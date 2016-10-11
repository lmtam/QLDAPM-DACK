<?php
/**
 * Created by PhpStorm.
 * User: giaulk
 * Date: 4/21/2016
 * Time: 9:43 AM
 */
namespace App\MyCore;

class Authentication {
    public function auth($email, $password) {
        /**
         * nếu env là local thì dùng API để auth, ngược lại thì dùng ldap
         */

    }
}