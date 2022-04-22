<?php
namespace Rest;

class Alias extends Service
{
    protected $service;
    protected $uri;

    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->service = 'alias';
    }

    public function list($params = [])
    {
        $this->uri = 'list';
        return $this->client->request('GET', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function create($params)
    {
        $this->uri = '';
        return $this->client->request('POST', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function delete($id)
    {
        $this->uri = $id;
        return $this->client->request('DELETE', $this->buildUri($this->service, $this->uri), $headers = []);
    }
}

?>