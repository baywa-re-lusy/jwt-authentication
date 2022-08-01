<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\TokenHydrator\ScopeStrategy;
use Laminas\Hydrator\ClassMethodsHydrator;

class TokenHydrator extends ClassMethodsHydrator
{
    public function __construct(bool $underscoreSeparatedKeys = true, bool $methodExistsCheck = false)
    {
        $this->addStrategy('scope', new ScopeStrategy());

        parent::__construct($underscoreSeparatedKeys, $methodExistsCheck);
    }

    public function extract(object $object): array
    {
        throw new \Exception("The TokenInfo object can't be extracted.");
    }
}
