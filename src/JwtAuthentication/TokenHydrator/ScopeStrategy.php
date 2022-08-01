<?php

namespace BayWaReLusy\JwtAuthentication\TokenHydrator;

use Laminas\Hydrator\Strategy\StrategyInterface;

class ScopeStrategy implements StrategyInterface
{

    public function extract($value, ?object $object = null)
    {
        throw new \Exception("The Scope info can't be extracted.");
    }

    public function hydrate($value, ?array $data)
    {
        if (!is_string($value)) {
            throw new \Exception("Scope must be a string.");
        }

        return explode(' ', $value);
    }
}
