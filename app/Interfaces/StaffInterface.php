<?php

namespace App\Interfaces;

interface StaffInterface
{
    public function addStaff($request,$password);
    public function checkLogin($email, $password, $rememberme);
}
