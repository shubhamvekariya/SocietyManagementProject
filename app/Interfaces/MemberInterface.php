<?php

namespace App\Interfaces;

interface MemberInterface
{
    public function addMember($request);
    public function checkLogin($email, $password, $rememberme);

}