<?php
namespace Rest;
use Rest\Reseller\SubAccount;
use Rest\Client;
use Rest\ClientException;

class Reseller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getSubaccount(): SubAccount
    {
        return new SubAccount($this->client);
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