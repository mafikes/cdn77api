<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface RawLogsResourceInterface
{
    public function getList();
    public function activateRawLog($cdnId);
    public function deactivateRawLog($cdnId);
    public function download($cdnResourceId, $fileName);
}
