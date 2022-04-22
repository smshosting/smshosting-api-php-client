<?php
namespace Rest;

class HttpClient
{
    public $logLevel = 'debug';
    protected static $host = 'https://api.smstools.it/rest/api/';
    protected $client;

    public $response;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => self::$host]);
    }

    public function request($method, $uri, $options)
    {
        try {
            $response = $this->client->request($method, $uri, $options);

            if ($this->logLevel === 'debug') {

                //print_r($options);
                //error_log('URI: '.$uri);

                //error_log('Status Code: ' . $response->getStatusCode());
                //error_log('Response Headers:' .$response->getHeaders());
                //$responseHeaders = $response->getHeaders();
                //foreach ($responseHeaders as $key => $value) {
                //    error_log("$key: $value");
                //}
            }

            return $this->response = new Response($response->getStatusCode(), $response->getBody(), $response->getHeaders());
        }
        catch(\GuzzleHttp\Exception\RequestException $e) {
            $response = $e->getResponse();
            return $this->response = new Response($response->getStatusCode(), $response->getBody()->getContents(), $response->getHeaders());
        }
        catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $this->response = new Response($response->getStatusCode(), $response->getBody()->getContents(), $response->getHeaders());
        }
    }
}
?>