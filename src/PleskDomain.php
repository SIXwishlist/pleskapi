<?php

namespace Fkomaralp\PleskAPI;

class PleskDomain extends BaseRequest
{


    public function delete($data)
    {
        $data = [
            "site" => ["del" => $data]
        ];

        return parent::request($data)->site->del->result;
    }
    public function set($data)
    {
        $data = [
            "site" => ["set" => $data]
        ];

        return parent::request($data)->site->set->result;
    }
}
