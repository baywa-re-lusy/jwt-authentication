<?php

namespace BayWaReLusy\JwtAuthentication;

use BayWaReLusy\JwtAuthentication\Token\Claim;
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
        if (array_key_exists('azp', $data)) {
            $clientId = $data['azp'];
        } elseif (array_key_exists('client_id', $data)) {
            $clientId = $data['client_id'];
        } else {
            throw new \Exception("The token doesn't contain a client ID.");
        }

        $claims = [];
        if (array_key_exists('authorization', $data)) {
            if (property_exists($data['authorization'], 'permissions')) {
                if (property_exists($data['authorization']->permissions[0], 'claims')) {
                    foreach ($data['authorization']->permissions[0]->claims as $name => $values) {
                        $claim = new Claim();
                        $claim
                            ->setName($name)
                            ->setValues($values);
                        $claims[] = $claim;
                    }
                }
            }
        }

        $object
            ->setClientId($clientId)
            ->setEmail($data['email']??null)
            ->setExp($data['exp'])
            ->setIss($data['iss'])
            ->setSub($data['sub'])
            ->setEmailVerified($data['email_verified'])
            ->setUsername($data['preferred_username'])
            ->setScopes(explode(' ', $data['scope']))
            ->setRoles($data['realm_access']->roles)
            ->setClaims($claims);

        return $object;
    }

    public function extract(object $object): array
    {
        throw new \Exception("The TokenInfo object can't be extracted.");
    }
}
