<?php

namespace Fkomaralp\PleskAPI;

use  anlutro\cURL\cURL;
use Spatie\ArrayToXml\ArrayToXml;

class BaseRequest
{
    public $xml;

    public function __construct(){

        $settings = Settings::find(1);

        $this->_secretKey = "";//$settings->plesk_secketkey;
        $this->_host = "";//$settings->plesk_api_host;
        $this->_protocol = "";//$settings->plesk_protocol;
        $this->_port = "";//$settings->plesk_port;
        $this->_root = "";//$settings->plesk_root_domain;

        $this->_default_db_password = "";//$settings->default_db_password;
        $this->_default_db_username = "";//$settings->default_db_username;
    }

    public function request($data){
        $xml = ArrayToXml::convert($data, 'packet');

        return $this->run($xml);
    }

    private function run($request)
    {
            $curl = new cURL();
            $request = $curl->newRawRequest("post", "$this->_protocol://$this->_host:$this->_port/enterprise/control/agent.php", $request)
                ->setHeader("Content-Type", "text/xml")
                ->setHeader("HTTP_PRETTY_PRINT", "TRUE")
                ->setHeader("KEY", $this->_secretKey);

            $response = $request->send();


        return simplexml_load_string($response);
    }

    function getRoot($with = ""){
        return $with . $this->_root;
    }

    function getDefaultDbUsername(){
        return $this->_default_db_username;
    }

    function getDefaultDbPassword(){
        return $this->_default_db_password;

    }

}