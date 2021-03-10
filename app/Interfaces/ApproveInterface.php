<?php

namespace App\Interfaces;

interface ApproveInterface
{
    public function approval();
    public function approve($user_id);
    public function reject($user_id);
    public function disapprovemembers();
    public function approveVisitor($visitor_id);
    public function rejectVisitor($visitor_id);
}
