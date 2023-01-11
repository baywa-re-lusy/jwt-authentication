<?php

namespace BayWaReLusy\JwtAuthentication\Test;

use BayWaReLusy\JwtAuthentication\Token;
use BayWaReLusy\JwtAuthentication\TokenHydrator;
use PHPUnit\Framework\TestCase;

class TokenHydratorTest extends TestCase
{
    protected TokenHydrator $instance;
    protected array $decodedToken;

    protected function setUp(): void
    {
        $this->instance = new TokenHydrator();
        $this->decodedToken = array(
            'exp' => 1673485065,
            'iat' => 1673449065,
            'jti' => '8107f7fa-c7a0-44d6-aae7-b497c60af20e',
            'iss' => 'https://issuer-domain.com/realms/master',
            'aud' => 'account',
            'sub' => 'b8b43b9d-d6de-4fee-808c-5327c8e833b5',
            'typ' => 'Bearer',
            'azp' => 'client1',
            'session_state' => '8a520e7b-296b-4d24-aa34-1d81f669008e',
            'acr' => '1',
            'allowed-origins' =>
                array (
                    0 => 'https://origin1.com',
                    1 => 'https://origin2.com',
                ),
            'realm_access' =>
                (object) array(
                    'roles' =>
                        array (
                            0 => 'realm-role1',
                            1 => 'realm-role2',
                        ),
                ),
            'resource_access' =>
                (object) array(
                    'client1' =>
                        (object) array(
                            'roles' =>
                                array (
                                    0 => 'role1',
                                ),
                        ),
                    'client2' =>
                        (object) array(
                            'roles' =>
                                array (
                                    0 => 'role2',
                                    1 => 'role3',
                                ),
                        ),
                ),
            'scope' => 'resource1:read resource1:write resource2:read resource2:write',
            'sid' => '93d0cc22-c1e2-45a9-814b-02b6c0cadd93',
            'email_verified' => true,
            'preferred_username' => 'my.username',
            'given_name' => '',
            'email' => 'test@test.com',
        );
    }

    public function testHydrate(): void
    {
        $hydratedToken = $this->instance->hydrate($this->decodedToken, new Token());

        $this->assertEquals('b8b43b9d-d6de-4fee-808c-5327c8e833b5', $hydratedToken->getSub());
        $this->assertEquals('https://issuer-domain.com/realms/master', $hydratedToken->getIss());
        $this->assertEquals('client1', $hydratedToken->getClientId());
        $this->assertEquals(1673485065, $hydratedToken->getExp());
        $this->assertEquals('test@test.com', $hydratedToken->getEmail());
        $this->assertTrue($hydratedToken->getEmailVerified());
        $this->assertEquals('my.username', $hydratedToken->getUsername());
        $this->assertEquals(['realm-role1', 'realm-role2'], $hydratedToken->getRoles());
        $this->assertEquals(
            ['resource1:read', 'resource1:write', 'resource2:read', 'resource2:write'],
            $hydratedToken->getScopes()
        );
    }
}
