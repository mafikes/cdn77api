<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface DataQueueResourceInterface
{
    public function getListAll($type);
    public function getList($cdnResourceId, $type);
    public function getDetail($requestId);
    public function getListUrl($cdnResourceId, $requestId);
}
