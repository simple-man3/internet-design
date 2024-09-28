<?php

namespace App\Clients;

class Configuration
{
    public function __construct(protected string $host)
    {
    }

    public function getHost(): string
    {
        return $this->host;
    }
}
