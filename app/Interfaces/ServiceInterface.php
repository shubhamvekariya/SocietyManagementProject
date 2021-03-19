<?php

namespace App\Interfaces;

interface ServiceInterface
{
    public function addService($request);
    public function showService($request);
    public function deleteService($service);
    public function updateService($request,$service);

}
