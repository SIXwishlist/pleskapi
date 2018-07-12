<?php

namespace Fkomaralp\PleskAPI;

use Spatie\ArrayToXml\ArrayToXml;

class PleskBackup extends BaseRequest
{

    public function create($data)
    {
        $data = ["backup-manager" => ["backup-webspace"=> $data]];

        return parent::request($data)->{"backup-manager"}->{"backup-webspace"}->result;
    }

    public function get($data)
    {
        $data = ["backup-manager" => ["get-local-backup-list"=> $data]];
        return parent::request($data)->{"backup-manager"}->{"get-local-backup-list"}->result;
    }

    public function delete($data)
    {
        $data = ["backup-manager" => ["remove-file"=> $data]];
        return parent::request($data)->{"backup-manager"}->{"remove-file"}->result;
    }

}
