<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface ReportResourceInterface
{
    public function getDetailTraffic($type, $dateFrom, $dateTo, $cdnIds);
}
