<?php

namespace App\http;

class Response
{
    private int $httpCode;
    private array $headers;
    private string $contentType;
    private mixed $content;

    public function __construct($httpCode = 200, mixed $content = [], string $contentType = 'text/html')
    {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    public function setContentType(string $contentType): void {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function addHeader(string $key, string $value): string
    {
        return $this->headers[$key] = $value;
    }

    private function sendHeaders() {
        http_response_code($this->httpCode);

        foreach($this->header AS $key => $value) {
            header($key . ":" . $value);
        }
    }

    public function sendResponse()
    {
        $this->sendHeaders();

        if ($this->contentType == 'text/html') {
            return $this->content;
        }

        return [];
    }
}