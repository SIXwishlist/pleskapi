<?php

namespace Fkomaralp\PleskAPI;

class PleskApplications extends BaseRequest
{


    public function install($data)
    {
        $data = [
            "aps" => ["install" => $data]
        ];
        return parent::request($data)->aps->install->result->status;
    }



}
