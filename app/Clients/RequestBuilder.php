<?php

namespace App\Clients;

use GuzzleHttp\Psr7\Request;

class RequestBuilder
{
    public function __construct(
        protected string $resourcePath,
        protected string $method,
        protected array  $headers = [],
        protected ?array  $body = null,
        protected bool   $bodyAsQuery = false,
    )
    {
    }

    public function build(Configuration $config): Request
    {
        return new Request(
            $this->method,
            $config->getHost() . $this->resourcePath,
            $this->headers,
            $this->bodyAsQuery
                ? http_build_query($this->body)
                : $this->body,
        );
    }
}
