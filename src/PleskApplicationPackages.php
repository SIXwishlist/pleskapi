<?php

namespace Fkomaralp\PleskAPI;

class PleskApplicationPackages extends BaseRequest
{


    public function get($data)
    {
        if(array_key_exists("package-name", $data)){

            $data = [
                "aps" => ["get-packages-list" => ["all" => ""]]
            ];

            $all_packages = parent::request($data)->aps->{"get-packages-list"}->result;

            $count = count($all_packages->package);

            for($i = 0; $i <= $count; $i++){

                $package = $all_packages->package[$i];

                if($package->name == "WordPress"){
                    return $package;
                }
            }

            return false;
        }

        $data = [
            "aps" => ["get-packages-list" => $data]
        ];

        return parent::request($data)->aps->{"get-packages-list"}->result;
    }



}
