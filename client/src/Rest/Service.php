<?php
namespace Rest;

abstract class Service
{
    /**
     * @var Client Rest Client
     */
    protected $client;

    /**
     * @var string service name
     */
    protected $service;

    /**
     * Construct a new Service
     * @param Client $client
     */
    public function __construct(Client $client) {
        $this->client = $client;
        $this->service = '';
    }

    public function buildUri($service, $uri = null)
    {
        return \implode('/', [\trim($service, '/'), \trim($uri, '/')]);
    }
}
?>