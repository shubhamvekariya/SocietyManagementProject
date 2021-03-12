<?php

namespace App\Interfaces;

interface MeetingInterface
{
    public function addMeeting($request);
    public function showMeeting($request);
    public function deleteMeeting($meeting);
    public function updateMeeting($request,$meeting);

}
