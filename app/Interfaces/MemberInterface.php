<?php

namespace App\Interfaces;

interface MemberInterface
{
    public function checkLogin($email, $password, $rememberme);
    public function getMembers();
    public function getSocietyMember();
    public function editMember();
    public function setPassword($request);
    public function forgotPassword($member);
}
