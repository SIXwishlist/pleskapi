<?php

namespace Fkomaralp\PleskAPI;

class PleskServicePlans extends BaseRequest
{


    public function get($data)
    {
        $data = [
            "service-plan" => ["get" => $data]
        ];
        return parent::request($data)->{"service-plan"}->get;
    }


}
