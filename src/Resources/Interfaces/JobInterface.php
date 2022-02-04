<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface JobInterface
{
    public function getList($id, $type);
    public function getDetail($id, $jobId);
    public function prefetch($id, $data);
    public function purge($id, $data);
    public function purgeAll($id);
}
