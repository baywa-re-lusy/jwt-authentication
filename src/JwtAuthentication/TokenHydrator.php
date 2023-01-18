<?php

namespace BayWaReLusy\JwtAuthentication;

use Laminas\Hydrator\AbstractHydrator;

class TokenHydrator extends AbstractHydrator
{
    /**
     * @param array $data
     * @param Token $object
     * @return Token
     */
    public function hydrate(array $data, object $object)
    {
        $object
            ->setClientId($data['azp'])
            ->setEmail($data['email'])
            ->setExp($data['exp'])
            ->setIss($data['iss'])
            ->setSub($data['sub'])
            ->setEmailVerified($data['email_verified'])
            ->setUsername($data['preferred_username'])
            ->setScopes(explode(' ', $data['scope']))
            ->setRoles($data['realm_access']->roles);

        return $object;
    }

    public function extract(object $object): array
    {
        throw new \Exception("The TokenInfo object can't be extracted.");
    }
}
