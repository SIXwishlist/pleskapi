<?php

namespace Fkomaralp\PleskAPI;

use Spatie\ArrayToXml\ArrayToXml;

class PleskSubscriptions extends BaseRequest
{

//    public $webspace;
//    public function __construct(){
//        parent::__construct();
////        $this->webspace = $this->xml->addChild("webspace");
//    }

    public function add($data)
    {
        $data = [
            "webspace" => ["add" => $data]
        ];

        return parent::request($data)->webspace->add->result;
    }

    public function get($data)
    {
        $data = [
            "webspace" => ["get" => $data]
        ];

        return parent::request($data)->webspace->get->result;
    }

}
