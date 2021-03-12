<?php

namespace App\Interfaces;

interface AssetInterface
{
    public function addAsset($request);
    public function showAsset($request);
    public function deleteAsset($asset);
    public function updateAsset($request,$asset);

}
