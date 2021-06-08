<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface CdnResourceInterface
{
    public function create($data);
    public function getDetail($cdnResourceId);
    public function edit($cdnResourceId, $data);
    public function delete($cdnResourceId);
    public function getList();
}
