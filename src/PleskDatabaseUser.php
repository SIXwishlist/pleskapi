<?php

namespace Fkomaralp\PleskAPI;

class PleskDatabaseUser extends BaseRequest
{
    public function add($data)
    {
        $data = [
            "database" => ["add-db-user" => $data]
        ];

        return parent::request($data)->database->{"add-db-user"}->result;
    }

    public function delete($data)
    {
        $data = [
            "database" => ["del-db-user" => $data]
        ];

        return parent::request($data)->database->{"del-db-user"}->result;
    }
}
