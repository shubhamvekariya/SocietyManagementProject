<?php

namespace App\Interfaces;

interface FamilymemInterface
{
    public function addFamilymem($request);
    public function showFamilymem($request);
    public function deleteFamilymem($id);
    public function editFamilymem($id);
    public function updateFamilymem($request);

}
