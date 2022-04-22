<?php
namespace Rest;

class Sms extends Service
{
    protected $service;
    protected $uri;

    public function __construct(Client $client)
    {
        parent::__construct($client);
        $this->service = 'sms';
    }

    public function send($params = [])
    {
        $this->uri = 'send';
        return $this->client->request('POST', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function sendbulk($params = [])
    {
        $this->uri = 'sendbulk';
        return $this->client->request('POST', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function cancel($params = [])
    {
        $this->uri = 'cancel';
        return $this->client->request('POST', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }

    public function search($params = [])
    {
        $this->url = 'search';
        return $this->client->request('GET', $this->buildUri($this->service, $this->uri), $headers = [], $params);
    }
}

?>