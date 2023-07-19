<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

trait AuthUser{
    public function currentUser(){
        return Session::get('User_Details');
    }
    public function getRoleIds(){
        return $this->currentUser()['role_id'];
    }
    public function getRoleNames(){
        return $this->currentUser()['role_name'];
    }
    public function userId(){
        return $this->currentUser()['user_id'];
    }
}
