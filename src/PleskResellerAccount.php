<?php

namespace Fkomaralp\PleskAPI;

class PleskResellerAccount extends BaseRequest
{

    public function add($data)
    {
        $data = ["reseller" => ["add" => $data]];
        return parent::request($data)->reseller->add->result;
    }



}
