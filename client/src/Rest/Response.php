<?php
namespace Rest;

class Response
{
    protected $statusCode;
    protected $content;
    protected $headers;

    public function __construct(int $statusCode, $content, $headers)
    {
        $this->statusCode = $statusCode;
        $this->content = $content;
        $this->headers = $headers;
    }

    public function getCode(): int
    {
        return $this->statusCode;
    }

    public function getContent()
    {
        return \json_decode($this->content);
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
?>