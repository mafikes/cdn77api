<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface RawLogsResourceInterface
{
    public function getFiles();
    public function download($cdnResourceId, $fileName);
}
