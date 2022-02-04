<?php

namespace Mafikes\Cdn77Api\Resources\Interfaces;

interface OriginInterface
{
    public function getList();
    public function create($data);
    public function getDetail($id);
    public function edit($id, $data);
    public function delete($id);
    public function createAwsOrigin($data);
}
