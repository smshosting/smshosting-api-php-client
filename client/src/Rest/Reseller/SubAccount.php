<?php
namespace Rest\Reseller;
use Rest\Service;
use Rest\Client;

class SubAccount extends Service
{
    protected $service;
    protected $uri;

    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->service = 'reseller';
    }

    public function info($id)
    {
        $this->uri = 'subuser/'.$id;
        return $this->client->request('GET', $this->buildUri($this->service, $this->uri), $headers = []);
    }

    public function search($params = array())
    {
        $this->uri = 'subuser/search';
        return $this->client->request('GET', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function create($params)
    {
        $this->uri = 'subuser';
        return $this->client->request('POST', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function update($id, $params)
    {
        $this->uri = 'subuser/'.$id;
        return $this->client->request('PUT', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function delete($id)
    {
        $this->uri = 'subuser/'.$id;
        return $this->client->request('DELETE', $this->buildUri($this->service, $this->uri), $headers = []);
    }
}

?>