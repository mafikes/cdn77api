<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface StatsResourceInterface
{
    public function get($type, $dateFrom, $dateTo, $cdnIds, $locationIds, $aggregation);
}
