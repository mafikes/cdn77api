<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface DataManagementInterface
{
    public function prefetch($cdnResourceId, $urls);
    public function purge($cdnResourceId, $urls);
    public function purgeAll($cdnResourceId);
}
