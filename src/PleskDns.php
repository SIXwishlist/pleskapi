<?php

namespace Fkomaralp\PleskAPI;

use App\Settings;
use App\Themes;
use Ifsnop\Mysqldump as IMysqldump;
use PDO;


class PleskDns extends BaseRequest
{
    public function add($data)
    {
        $data = [
            "dns" => ["add_rec" => $data]
        ];

        return parent::request($data)->dns->{"add_rec"}->result;
    }

    public function delete($data)
    {
        $data = [
            "dns" => ["del_rec" => $data]
        ];

        return parent::request($data)->dns->{"del_rec"}->result;
    }
}
