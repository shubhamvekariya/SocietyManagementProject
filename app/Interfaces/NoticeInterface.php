<?php

namespace App\Interfaces;

interface NoticeInterface
{
    public function addNotice($request);
    //public function showNotice($request);
    public function deleteNotice($notice);
    public function updateNotice($request,$meeting);

}
