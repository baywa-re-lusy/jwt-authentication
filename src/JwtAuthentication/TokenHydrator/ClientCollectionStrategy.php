<?php

namespace BayWaReLusy\JwtAuthentication\TokenHydrator;

use BayWaReLusy\JwtAuthentication\Token\Client;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\Hydrator\Strategy\StrategyInterface;

class ClientCollectionStrategy implements StrategyInterface
{
    public function extract($value, ?object $object = null)
    {
        if (is_null($value)) {
            return null;
        }

        $hydrator = new ClassMethodsHydrator();
        $result   = [];

        foreach ($value as $val) {
            $result[] = $hydrator->extract($val);
        }

        return $result;
    }

    public function hydrate($value, ?array $data)
    {
        if (is_null($value)) {
            return null;
        }

        $hydrator = new ClassMethodsHydrator();
        $result   = [];

        foreach ($value as $val) {
            $result[] = $hydrator->hydrate($val, new Client());
        }

        return $result;
    }
}
