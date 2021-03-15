<?php

namespace App\Interfaces;

interface StaffInterface
{
    public function addStaff($request, $password);
    public function checkLogin($email, $password, $rememberme);
    public function allStaffs();
    public function editStaff($request, $staff);
    public function deleteStaff($staff);
    public function setPassword($request);
    public function staffAttendance();
}
