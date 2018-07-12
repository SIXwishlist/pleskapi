<?php

namespace Fkomaralp\PleskAPI;

class PleskCustomer extends BaseRequest
{

    public function add($data)
    {
        $data = ["customer" => ["add"=> $data]];

        return parent::request($data)->customer->add->result;
    }

    public function get($data)
    {
        $data = ["customer" => ["get"=> $data]];

        return parent::request($data)->customer->get->result;
    }


    public function delete($data)
    {
        $data = ["customer" => ["del"=> $data]];


        return parent::request($data)->customer->add->result;
    }

}
