<?php

namespace Database\Factories;

use DIJ\ApiFactories\ApiFactory;
use Illuminate\Support\Collection;

abstract class BaseApiFactory extends ApiFactory
{
    protected function generateResponseList(string $class, array $extra, int $count): Collection
    {
        $result = $this->count($count)->make($extra)->toArray();

        return collect([
            'data' => $class::collect($result, Collection::class)
        ]);
    }
}
