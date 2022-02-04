<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface StorageResourceInterface
{
    public function getList();
    public function detail($id);
}
