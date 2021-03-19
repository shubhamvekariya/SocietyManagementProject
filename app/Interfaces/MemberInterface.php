<?php

namespace App\Interfaces;

interface MemberInterface
{
    // public function addMember($request);
    public function checkLogin($email, $password, $rememberme);
    public function getMembers();
    public function getSocietyMember();
    public function editMember();
}
