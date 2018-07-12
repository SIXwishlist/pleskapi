<?php

namespace Fkomaralp\PleskAPI;

use App\HipChatLogger;
use Illuminate\Support\Facades\Log;

class PleskSubdomain extends BaseRequest
{


    public function get($data)
    {
        $data = [
            "subdomain" => ["get" => $data]
        ];


        return parent::request($data)->subdomain->get->result;
    }
    public function create($data)
    {

        $data = [
            "subdomain" => ["add" => $data]
        ];

        return parent::request($data)->subdomain->add->result;
    }
    public function delete($data)
    {

        $data = [
            "subdomain" => ["del" => $data]
        ];

        return parent::request($data)->subdomain->del->result;
    }

}
