<?php

namespace mcheck;

use mcheck\net\RequestInterface;

class MCheckRest
{
    const BASE_URL = "https://isms.center";
    const API_VERSION = "v1";

    private $http_client;

    function __construct($auth_token, $engine = RequestInterface::HANDLER_UNKNOWN, $base_url = self::BASE_URL, $version = self::API_VERSION)
    {
        if ((!isset($auth_token)) || (!$auth_token))
            throw new MCheckError("no auth_token specified");

        $url = $base_url."/".$version;
        $this->http_client = RequestInterface::Create($url, $auth_token, $engine);
    }

    public function RequestValidation($params)
    {
        return $this->http_client->request(RequestInterface::METHOD_POST, '/validation/request', $params);
    }

    public function VerifyPin($params)
    {
        return $this->http_client->request(RequestInterface::METHOD_POST, '/validation/verify', $params);
    }

    public function ValidationStatus($params)
    {
        return $this->http_client->request(RequestInterface::METHOD_POST, '/validation/status/', $params);
    }

    private function pop($params, $key)
    {
        $val = $params[$key];

        if (!$val)
            throw new MCheckError($key." parameter not found");

        unset($params[$key]);
        return $val;
    }

}
