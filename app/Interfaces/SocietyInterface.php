<?php

namespace App\Interfaces;

interface SocietyInterface
{
    public function addSociety($request);
    public function checkLogin($email, $password, $rememberme);
    public function forgotPassword($society);
    public function setPassword($request);
}
