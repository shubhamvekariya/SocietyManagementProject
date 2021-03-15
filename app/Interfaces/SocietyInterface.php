<?php

namespace App\Interfaces;

interface SocietyInterface
{
    public function addSociety($request);
    public function checkLogin($email, $password, $rememberme);
}
