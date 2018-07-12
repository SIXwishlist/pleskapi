<?php

namespace Fkomaralp\PleskAPI;

use Spatie\ArrayToXml\ArrayToXml;

class PleskSiteAlias extends BaseRequest
{

    public function create(array $data)
    {
        $data = ["site-alias" => ["create"=> $data]];

        return parent::request($data)->{"site-alias"}->{"create"}->result;
    }
    public function delete(array $data)
    {
        $data = ["site-alias" => ["delete"=> $data]];
        return parent::request($data)->{"site-alias"}->{"delete"}->result;
    }

}
