<?php

namespace App\Clients;

use App\Exceptions\ApiException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

abstract class Api
{
    public function __construct(protected ClientInterface $client, protected Configuration $config)
    {
    }

    /**
     * @throws ApiException
     */
    protected function send(RequestBuilder $request, callable $fn): mixed
    {
        try {
            $response = $this->client->send($request->build($this->config));
        } catch (Throwable $e) {
            throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), $e->getResponse());
        }

        return $fn($this->deserialize($response));
    }

    protected function deserialize(ResponseInterface $response): mixed
    {
        return json_decode((string)$response->getBody(), true);
    }
}
