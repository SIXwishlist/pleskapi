<?php

namespace Fkomaralp\PleskAPI;

use  anlutro\cURL\cURL;

class PleskAPI
{
    public $request;

    private $_host;
    private $_port;
    private $_protocol;
    private $_login;
    private $_password;
    private $_secretKey;

    private $root_site = "onno.site";

    private $xml;
    /**
     * Create client
     *
     * @param string $host
     * @param int $port
     * @param string $protocol
     */
    public function __construct($host, $port = 8443, $protocol = 'https')
    {
        $this->_host = $host;
        $this->_port = $port;
        $this->_protocol = $protocol;

        $this->xml = new \SimpleXMLElement('<packet/>');

    }
    /**
     * Setup credentials for authentication
     *
     * @param string $login
     * @param string $password
     */
    public function setCredentials($login, $password)
    {
        $this->_login = $login;
        $this->_password = $password;
    }
    /**
     * Define secret key for alternative authentication
     *
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->_secretKey = $secretKey;
    }
    /**
     * Perform API request
     *
     * @param string $request
     * @return string
     */
    public function request($request)
    {
        $curl = new cURL();
        $request = $curl->newRawRequest("post", "$this->_protocol://$this->_host:$this->_port/enterprise/control/agent.php", $request)
        ->setHeader("Content-Type", "text/xml")
        ->setHeader("HTTP_PRETTY_PRINT", "TRUE")
        ->setHeader("KEY", $this->_secretKey);

        $response = $request->send();

        $xml = simplexml_load_string($response);

        return $xml;
    }



}
