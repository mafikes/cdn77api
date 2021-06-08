<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface StorageResourceInterface
{
    public function create($zoneName, $storageLocationId);
    public function detail($storageId);
    public function delete($storageId);
    public function getList();
    public function getLocationsList();
    public function addCdnResource($storageId, $cdnResourceIds);
}
