<?php

namespace App\Interfaces;

interface ComplaintInterface
{
    public function addComplaint($request);
    public function showComplaint($request);
    public function deleteComplaint($complaint);
    public function updateComplaint($request,$complaint);
    public function resolveComplaint($request,$complaint);
}
