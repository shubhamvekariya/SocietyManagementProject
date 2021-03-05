<?php

namespace App\Interfaces;

interface RuleInterface
{
    public function addRule($request);
    public function showRule($request);
    public function deleteRule($id);
    public function editRule($id);
    public function updateRule($request);

}
