<?php

namespace Rest;

use Rest\HttpClient;
use Rest\ClientException;

/**
 * @property Rest\Alias $alias
 * @property Rest\Sms $sms
 * @property Rest\Reseller $reseller
 * @method Rest\Alias aliases (string $id)
 * @method Rest\Sms sms
 * @method Rest\Reseller reseller
 */
class Client
{
    protected $authKey;
    protected $authSecret;
    protected $httpClient;
    
    public function __construct($authKey = null, $authSecret = null) 
    {
        $this->authKey = $authKey;
        $this->authSecret = $authSecret;

        if (!$this->authKey || !$this->authSecret) {
            throw new ClientException('Credentials are required to create a Client');
        }
        
        $this->httpClient = new HttpClient();
    }

    public function request($method, $uri, $headers = [], $params = [])
    {
        if ($method === 'POST'|| $method === 'PUT') {
            $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        }

        //if (!\array_key_exists('Accept', $headers)) {
            $headers['Accept'] = 'application/json';
        //}

        $response = $this->httpClient->request(
            $method,
            $uri,[
                'auth' => [$this->authKey, $this->authSecret],
                'headers' => $headers,
                'query' => $params
            ],
        );

        return $response;
    }

    protected function getAlias(): Alias
    {
        return new Alias($this);
    }

    protected function getSmS(): Sms
    {
        return new Sms($this);
    }

    protected function getReseller(): Reseller
    {
        return new Reseller($this);
    }

    public function __get(string $name) 
    {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new ClientException('Unknown ' . $name);
    }
}
?>