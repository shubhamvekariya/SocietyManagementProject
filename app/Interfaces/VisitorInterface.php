<?php

namespace App\Interfaces;

interface VisitorInterface
{
    public function addVisitor($request);
    public function getVisitors();
    public function editVisitor($request,$visitor);
}
